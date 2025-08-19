<?php

namespace App\Http\Controllers;

use App\Http\Resources\PaymentsResource;
use App\Models\Payment;
use App\Models\Hospital;
use App\Models\SubscriptionType;
use App\Models\Subtype;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Carbon\Carbon;

class PaymentsControllers extends Controller
{
    /**
     * Check if hospital has valid payment
     */
    public function getByHospital($hospitalId)
    {
        $payment = Payment::where('hospital_id', $hospitalId)
            ->where('status', 1)
            ->whereDate('end_date', '>=', Carbon::now()) // ✅ only valid if not expired
            ->first();

        return response()->json(['paid' => (bool)$payment]);
    }

    /**
     * Initialize Paystack payment
     */
    public function initialize(Request $request)
    {
        $request->validate([
            'hospital_id' => 'required|exists:hospitals,id',
            'subtype_id' => 'required|exists:subscription_types,id',
        ]);

        $hospital = Hospital::findOrFail($request->hospital_id);
        $subtype = SubscriptionType::findOrFail($request->subtype_id);

        $amount = $subtype->price * 100;
        $duration = $subtype->duration;

        $response = Http::withToken(env('PAYSTACK_SECRET_KEY'))
            ->post('https://api.paystack.co/transaction/initialize', [
                'email' => $hospital->hospital_email,
                'amount' => $amount,
                'callback_url' => config('app.url') . ':5173/register',
                'metadata' => [
                    'hospital_id' => $hospital->id,
                    'subtype_id' => $subtype->id,
                    'duration' => $duration,
                    'valid_days' => $duration,
                ],
            ]);

        return response()->json($response->json());
    }


    /**
     * Paystack callback - verify & save payment
     */
    public function callback(Request $request)
    {
        $reference = $request->query('reference');

        $verification = Http::withToken(env('PAYSTACK_SECRET_KEY'))
            ->get("https://api.paystack.co/transaction/verify/{$reference}")
            ->json();

        if ($verification['status'] && $verification['data']['status'] === 'success') {
            $metadata = $verification['data']['metadata'];

            $startDate = Carbon::now();
            $endDate = Carbon::now()->addDays($metadata['valid_days']);

            $payment = Payment::create([
                'hospital_id' => $metadata['hospital_id'],
                'subtype_id' => $metadata['subtype_id'],
                'status' => 1,
                'start_date' => $startDate,
                'end_date' => $endDate,
                'reference' => $reference,
            ]);
            if ($payment) {
                return new PaymentsResource($payment);
            }
            return redirect('/auth/login?payment=success');

        }

        return redirect('/auth/login?payment=failed');
    }
}

