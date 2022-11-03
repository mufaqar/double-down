<?php /* Template Name: Cart */

//get_header('landing');





$request_body = '{
  "order": {
      "items": [
          {
            "reference": "10",
            "name": "Subscription product",
            "quantity": 1,
            "unit": "week",
            "unitPrice": 10000,
            "grossTotalAmount": 10000,
            "netTotalAmount": 10000
          }
      ],
      "amount": 10000,
      "currency": "NOK",
      "reference": "Subscription Test"
  },
  "checkout": {
      "url": "",
      "integrationType": "HostedPaymentPage",
      "returnUrl": "http://localhost/clients/food/checkout/",      
      "termsUrl": "http://localhost/clients/food/terms",
      "merchantTermsUrl": "http://localhost/clients/food/checkout/",
      
      
     
     
     
  },
 
  "myReference": "string",
  "charge": true,
}';

$curl = curl_init();

curl_setopt_array($curl, [
  CURLOPT_URL => "https://test.api.dibspayment.eu/v1/payments",
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => "",
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 30,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => "POST",
  CURLOPT_SSL_VERIFYPEER => "false",
  CURLOPT_POSTFIELDS => $request_body,
  CURLOPT_HTTPHEADER => [
    "Authorization: test-secret-key-90d47cae99df4ffa8ccf386d9d104441",
    "CommercePlatformTag: SOME_STRING_VALUE",
    "content-type: application/*+json"
  ],
]);

$response = curl_exec($curl);
$err = curl_error($curl);

curl_close($curl);

if ($err) {
  echo "cURL Error #:" . $err;
} else {
  echo $response;
}
