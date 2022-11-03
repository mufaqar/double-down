<?php /* Template Name: Test */

//get_header('landing');





require_once('stripe/init.php');

$request_body = '{
    "id": "il_tmp_1M00A2DzDUDvWAFdObtPvr5g",
    "object": "line_item",
    "amount": 45000,
    "amount_excluding_tax": 45000,
    "currency": "usd",
    "description": "My First Invoice Item (created for API docs)",
    "discount_amounts": [],
    "discountable": true,
    "discounts": [],
    "invoice_item": "ii_1M00A2DzDUDvWAFdObtPvr5g",
    "livemode": false,
    "metadata": {},
    "period": {
      "end": 1667469394,
      "start": 1667469394
    },
    "price": {
      "id": "price_1JwOeCDzDUDvWAFd2pM6a9n8",
      "object": "price",
      "active": true,
      "billing_scheme": "per_unit",
      "created": 1637057536,
      "currency": "usd",
      "custom_unit_amount": null,
      "livemode": false,
      "lookup_key": null,
      "metadata": {},
      "nickname": null,
      "product": "prod_KbbrAoWu64FYFk",
      "recurring": null,
      "tax_behavior": "unspecified",
      "tiers_mode": null,
      "transform_quantity": null,
      "type": "one_time",
      "unit_amount": 45000,
      "unit_amount_decimal": "45000"
    },
    "proration": false,
    "proration_details": {
      "credited_items": null
    },
    "quantity": 1,
    "subscription": null,
    "tax_amounts": [],
    "tax_rates": [],
    "type": "invoiceitem",
    "unit_amount_excluding_tax": "45000"
  }';


 

  // $stripe = new \Stripe\StripeClient('sk_test_W47QwqKfeqCRhaWhxOzZrvMt00Ihvlk5oc');
  // $customer = $stripe->customers->create([
  //     'description' => 'Softs Gens Customer',
  //     'email' => 'softsgens@gmail.com',
  //     'payment_method' => 'pm_card_visa',
  // ]);
  // echo $customer;



  $stripe = new \Stripe\StripeClient(
    'sk_test_W47QwqKfeqCRhaWhxOzZrvMt00Ihvlk5oc'
  );
  $stripe->invoices->create([
    'customer' => 'cus_MjTPbSKMklrE1N',
    
  ]);



