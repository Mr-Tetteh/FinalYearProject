<?php
function paystackInit($email, $amount): array{


    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://api.paystack.co/transaction/initialize",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_HTTPHEADER => [
            "Authorization: Bearer ".env('PAYSTACK_SECRET_KEY'),
            "Content-Type: application/json"
        ],
        CURLOPT_POSTFIELDS => json_encode([
            "email" => "$email",
            "amount" => "$amount"
        ])
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "cURL Error #: " . $err;
    } else {
        echo $response;
    }
    return json_decode($response, true);
}
