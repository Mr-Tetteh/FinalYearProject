<?php

namespace App\Http\Controllers;

use App\Http\Resources\PaymentsResource;
use App\Models\Payment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class PaymentsControllers extends Controller
{


    public function getByHospital($hospitalId)
    {
        $payment = Payment::where('hospital_id', $hospitalId)
            ->orderBy('created_at', 'desc')
            ->first();

        if (!$payment) {
            return response()->json([
                'message' => 'Payment not found for this hospital',
            ], 404);
        }

        return response()->json([
            'payment_url' => $payment->payment_url,
            'reference' => $payment->reference,
            'status' => $payment->status,
            // Include any other payment details you need
        ]);
    }

}
