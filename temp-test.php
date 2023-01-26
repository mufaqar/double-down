<?php /* Template Name: Test */

//get_header('landing');


//var specificDates = [new Date("2023,01,24"), new Date("2023,01,25"), new Date("2023,01,28") 

<?php $s = 'new Date("'; foreach($daily_order_dates as $daily_date)
                        {
                            
                           echo $s . $daily_date;
                           $s = '),';
                        }
                    ?>



echo "1" +2  * "007";

exit();

require_once('stripe/init.php');

print "<pre>";


$email = 'jaweria@live.com';

$stripe = new \Stripe\StripeClient(
  'sk_test_51LzR9tB7gTQeC9cUuSk9M2d6UmOcDzbgZZLwW8zwQUSF4on9CIENpzRo1RtXjEWByNVj1sWxvotQbjP48LHYqXCc00HeF10taV'
);
$customers = $stripe->customers->search([
  //'query' => 'email:jaweria@live.com',
  'query' => [
    'email' => 'jaweria@live.com',
  
  ],
]);

print_r($customers);

die();



// // get token and user details
// $stripeToken  = $_POST['stripeToken'];
// $customerName = $_POST['customerName'];
// $customerEmail = $_POST['emailAddress'];

// $customerAddress = $_POST['customerAddress'];
// $customerCity = $_POST['customerCity'];
// $customerZipcode = $_POST['customerZipcode'];
// $customerState = $_POST['customerState'];
// $customerCountry = $_POST['customerCountry'];

// $cardNumber = $_POST['cardNumber'];
// $cardCVC = $_POST['cardCVC'];
// $cardExpMonth = $_POST['cardExpMonth'];
// $cardExpYear = $_POST['cardExpYear'];   













// $request_body = '{
//   "id": "in_1M1mQgDzDUDvWAFdTULV3upv",
//   "object": "invoice",
//   "account_country": "US",
//   "account_name": "Muhammad Mufaqar Islam",
//   "account_tax_ids": null,
//   "amount_due": 45000,
//   "amount_paid": 0,
//   "amount_remaining": 45000,
//   "application": null,
//   "application_fee_amount": null,
//   "attempt_count": 0,
//   "attempted": true,
//   "auto_advance": true,
//   "automatic_tax": {
//     "enabled": false,
//     "status": null
//   },
//   "billing_reason": "manual",
//   "charge": "ch_1GH9ELDzDUDvWAFd2Pp7zn3X",
//   "collection_method": "charge_automatically",
//   "created": 1667893266,
//   "currency": "usd",
//   "custom_fields": null,
//   "customer": "cus_MjTPbSKMklrE1N",
//   "customer_address": null,
//   "customer_email": "softsgens@gmail.com",
//   "customer_name": null,
//   "customer_phone": null,
//   "customer_shipping": null,
//   "customer_tax_exempt": "none",
//   "customer_tax_ids": [],
//   "default_payment_method": null,
//   "default_source": null,
//   "default_tax_rates": [],
//   "description": null,
//   "discount": null,
//   "discounts": [],
//   "due_date": null,
//   "ending_balance": null,
//   "footer": null,
//   "from_invoice": null,
//   "hosted_invoice_url": null,
//   "invoice_pdf": null,
//   "last_finalization_error": null,
//   "latest_revision": null,
//   "lines": {
//     "object": "list",
//     "data": [
//       {
//         "id": "il_1M1mQgDzDUDvWAFdegdLGgrS",
//         "object": "line_item",
//         "amount": 45000,
//         "amount_excluding_tax": 45000,
//         "currency": "usd",
//         "description": "My First Invoice Item (created for API docs)",
//         "discount_amounts": [],
//         "discountable": true,
//         "discounts": [],
//         "invoice_item": "ii_1M1mQgDzDUDvWAFd9o6dCrIq",
//         "livemode": false,
//         "metadata": {},
//         "period": {
//           "end": 1667893266,
//           "start": 1667893266
//         },
//         "price": {
//           "id": "price_1JwOeCDzDUDvWAFd2pM6a9n8",
//           "object": "price",
//           "active": true,
//           "billing_scheme": "per_unit",
//           "created": 1637057536,
//           "currency": "usd",
//           "custom_unit_amount": null,
//           "livemode": false,
//           "lookup_key": null,
//           "metadata": {},
//           "nickname": null,
//           "product": "prod_KbbrAoWu64FYFk",
//           "recurring": null,
//           "tax_behavior": "unspecified",
//           "tiers_mode": null,
//           "transform_quantity": null,
//           "type": "one_time",
//           "unit_amount": 45000,
//           "unit_amount_decimal": "45000"
//         },
//         "proration": false,
//         "proration_details": {
//           "credited_items": null
//         },
//         "quantity": 1,
//         "subscription": null,
//         "tax_amounts": [],
//         "tax_rates": [],
//         "type": "invoiceitem",
//         "unit_amount_excluding_tax": "45000"
//       }
//     ],
//     "has_more": false,
//     "url": "/v1/invoices/in_1M1mQgDzDUDvWAFdTULV3upv/lines"
//   },
//   "livemode": false,
//   "metadata": {},
//   "next_payment_attempt": 1667896866,
//   "number": "4A955D43-DRAFT",
//   "on_behalf_of": null,
//   "paid": true,
//   "paid_out_of_band": false,
//   "payment_intent": null,
//   "payment_settings": {
//     "default_mandate": null,
//     "payment_method_options": null,
//     "payment_method_types": null
//   },
//   "period_end": 1667893266,
//   "period_start": 1667893266,
//   "post_payment_credit_notes_amount": 0,
//   "pre_payment_credit_notes_amount": 0,
//   "quote": null,
//   "receipt_number": null,
//   "rendering_options": null,
//   "starting_balance": 0,
//   "statement_descriptor": null,
//   "status": "paid",
//   "status_transitions": {
//     "finalized_at": null,
//     "marked_uncollectible_at": null,
//     "paid_at": null,
//     "voided_at": null
//   },
//   "subscription": null,
//   "subtotal": 45000,
//   "subtotal_excluding_tax": 45000,
//   "tax": null,
//   "test_clock": null,
//   "total": 45000,
//   "total_discount_amounts": [],
//   "total_excluding_tax": 45000,
//   "total_tax_amounts": [],
//   "transfer_data": null,
//   "webhooks_delivered_at": null,
//   "last_payment_attempt": null
// }';


 

  // $stripe = new \Stripe\StripeClient('sk_test_W47QwqKfeqCRhaWhxOzZrvMt00Ihvlk5oc');
  // $customer = $stripe->customers->create([
  //     'description' => 'Softs Gens Customer',
  //     'email' => 'softsgens@gmail.com',
  //     'payment_method' => 'pm_card_visa',
  // ]);
  // echo $customer;



  // $stripe = new \Stripe\StripeClient(
  //   'sk_test_W47QwqKfeqCRhaWhxOzZrvMt00Ihvlk5oc'
  // );
  // $stripe->invoices->create([
  //   'customer' => 'cus_MjTPbSKMklrE1N',
    
  // ]);


  $stripe = new \Stripe\StripeClient(
    'sk_test_51LzR9tB7gTQeC9cUuSk9M2d6UmOcDzbgZZLwW8zwQUSF4on9CIENpzRo1RtXjEWByNVj1sWxvotQbjP48LHYqXCc00HeF10taV'
  );
 



//  $customer_added =  $stripe->customers->allSources(
//   'cus_MlKcuFassOMnRL',
//   ['object' => 'card', 'limit' => 3]
// );



  // $stripe = new \Stripe\StripeClient('sk_test_51LzR9tB7gTQeC9cUuSk9M2d6UmOcDzbgZZLwW8zwQUSF4on9CIENpzRo1RtXjEWByNVj1sWxvotQbjP48LHYqXCc00HeF10taV');
  // $customer = $stripe->customers->create([
  //     'description' => 'Softs Gens Customer',
  //     'email' => 'softsgens@gmail.com',
  //     'payment_method' => 'pm_card_visa',
  // ]);
  // echo $customer;



$method =  $stripe->paymentMethods->create([
  'type' => 'card',
  'card' => [
    'number' => '4242424242424242',
    'exp_month' => 11,
    'exp_year' => 2023,
    'cvc' => '314',
  ],
]);






 $customer_added = $stripe->paymentIntents->create(
  array(
       'amount' => 16500,
       'currency' => 'NOK',      
      'payment_method_types' => array('card'),
      'payment_method' => $method->id,
      'customer' => 'cus_MlTVknOyPYZluK',
      
      
      )
);



$confirm_payment = $stripe->paymentIntents->confirm(
  $customer_added->id,
  ['payment_method' => 'pm_card_visa']
);

print_r($confirm_payment);
die();

// // details for which payment performed
// $payDetails = $stripe->paymentIntents->create(array(
//     'customer' => 'cus_MlKcuFassOMnRL',
//     'amount'   => 5000,
//     'currency' => 'NOK',
//     'description' => "inovice item Name",
//     'metadata' => array(
//         'order_id' => 1560
//     ),

// )); 



$arrayVar = [
    "id" => "pm_1Lw6Db2eZvKYlo2CsbAYSXpj",
    "object" => "payment_method",
    "billing_details" => array(
        "address" => array(
            "city" => "Lahore",
            "country" => "Pakisan",
            "line1" => "H # 134 Block B",
            "line2" => "AHS",
            "postal_code" => "54800",
            "state" => "Punjab",
         ),
        "email" => 'softsgens@gmail.com',
        "name" => "Softs Gens",
        "phone" => "0302 6006",
      ),
    "card" => array(
        "brand" => "visa",
        "checks" => array(
            "address_line1_check" => null,
            "address_postal_code_check" => null,
            "cvc_check" => "unchecked",
          ),
        "country" => "US",
        "exp_month" => 8,
        "exp_year" => 2023,
        "fingerprint" => "Xt5EWLLDS7FJjR1c",
        "funding" => "credit",
        "generated_from" => null,
        "last4" => "4242",
        "networks" => ["available" => ["visa"], "preferred" => null],
        "three_d_secure_usage" => ["supported" => true],
        "wallet" => null,
      ),
    "created" => 1666539368,
    "customer" => "cus_9BoKyB2Km2T7TE",
    "livemode" => false,
    "metadata" => array("order_id" => "6735"),
    "type" => "card",
];





    $payDetails = $stripe->customers->update(
    
      );

  

// get payment details
$paymenyResponse = $payDetails->jsonSerialize();

print "<pre>";
print_r($paymenyResponse);






