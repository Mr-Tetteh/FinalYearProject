<?php
function paystack(): array
{
    $url = "https://api.paystack.co/paymentrequest";
    $fields = [
        "description" => "a test invoice",
        "line_items" => [
            ["name" => "item 1", "amount" => 20000],
            ["name" => "item 2", "amount" => 20000]
        ],
        "tax" => [
            ["name" => "VAT", "amount" => 2000]
        ],
        "customer" => "CUS_xwaj0txjryg393b",
        "due_date" => "2020-07-08"
    ];

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        "Authorization: Bearer " . env("PAYSTACK_SECRET_KEY"),
        "Content-Type: application/json"
    ]);

    $response = curl_exec($ch);
    curl_close($ch);

    return json_decode($response, true);
}
