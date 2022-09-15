<?php /* Template Name: Payment (P)  */
get_header();
global $current_user;
wp_get_current_user();

$uid =  get_current_user_id() ;


?>
<?php include('navigation.php'); ?>
<div class="custom_container order_wrapper mt-5 mb-5">
    <form class="addmeeting" id="addmeeting" action="#">
        <div class="_inner mt-4 p-5">
            
            

            <div class="_content mt-5 mb-5">
                <h2>Payment </h2>
                <div class="row">

                <?php

                    /*{
                        "checkout": {
                        "integrationType": "HostedPaymentPage",
                        "returnUrl": "https://<YOUR_SERVER>/cart.html",
                        "termsUrl": "https://<YOUR_SERVER>/terms.htmtl"
                        },
                        "order": {
                        "items": [
                            {
                            "reference": "ref42",
                            "name": "Demo product",
                            "quantity": 2,
                            "unit": "hours",
                            "unitPrice": 80000,
                            "grossTotalAmount": 160000,
                            "netTotalAmount": 160000
                            }
                        ],
                        "amount": 160000,
                        "currency": "SEK",
                        "reference": "Demo Order"
                        }
  }

  */

                        $order_data = array();
                        $order_data = array( 
                        'checkout'  => array(        
                                                'integrationType'  => "HostedPaymentPage",
                                                'returnUrl'        => "http://localhost/clients/food/payment",
                                                'termsUrl'         => "http://localhost/clients/food/payment", 
                                            ),                         
                        'order'          => array( array(
                                                "reference"   => "ref42",
                                                "name"   => "Demo product",
                                                "quantity"   => 2,
                                                "unit"   => "hours",
                                                "unitPrice"   => 80000,
                                                "grossTotalAmount"   => 160000,
                                                "netTotalAmount"   => 160000
                                            ),
                                        ),
                       
                        'amount'         => 160000,
                        'currency'       => "SEK",
                        'reference'      => "Demo Order",
                       
                        );


                      //  print_r($order_data);

                      



                         
              /*          


                function redirect_to_checkout($order_data) {
                        // Will be implemented in the next step
                        // For now just echo the response:
                        echo "Working";
                        echo($order_data); 
                }

                //$payload = file_get_contents('payload.json');
                //assert(json_decode($payload) && json_last_error() == JSON_ERROR_NONE);

                $ch = curl_init('https://test.api.dibspayment.eu/v1/payments');
                curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'POST');
                curl_setopt($ch, CURLOPT_POSTFIELDS, $order_data);
                curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
                curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
                curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                         
                        'Content-Type: application/json',
                        'Accept: application/json',
                        'Authorization: test-secret-key-90d47cae99df4ffa8ccf386d9d104441'));                                                
                $result = curl_exec($ch);
                $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);

              

                redirect_to_checkout($result);

                */


                    $jsondata = '{
                        "order": {
                            "items": [
                                {
                                    "reference": "string",
                                    "name": "string",
                                    "quantity": 0,
                                    "unit": "string",
                                    "unitPrice": 0,
                                    "taxRate": 0,
                                    "taxAmount": 0,
                                    "grossTotalAmount": 0,
                                    "netTotalAmount": 0
                                }
                            ],
                            "amount": 0,
                            "currency": "string",
                            "reference": "string"
                        },
                        "checkout": {
                            "url": "string",
                            "integrationType": "string",
                            "returnUrl": "string",
                            "cancelUrl": "string",
                            "consumer": {
                                "reference": "string",
                                "email": "string",
                                "shippingAddress": {
                                    "addressLine1": "string",
                                    "addressLine2": "string",
                                    "postalCode": "string",
                                    "city": "string",
                                    "country": "string"
                                },
                                "phoneNumber": {
                                    "prefix": "string",
                                    "number": "string"
                                },
                                "privatePerson": {
                                    "firstName": "string",
                                    "lastName": "string"
                                },
                                "company": {
                                    "name": "string",
                                    "contact": {
                                        "firstName": "string",
                                        "lastName": "string"
                                    }
                                }
                            },
                            "termsUrl": "string",
                            "merchantTermsUrl": "string",
                            "shippingCountries": [
                                {
                                    "countryCode": "string"
                                }
                            ],
                            "shipping": {
                                "countries": [
                                    {
                                        "countryCode": "string"
                                    }
                                ],
                                "merchantHandlesShippingCost": true,
                                "enableBillingAddress": true
                            },
                            "consumerType": {
                                "default": "string",
                                "supportedTypes": [
                                    "string"
                                ]
                            },
                            "charge": true,
                            "publicDevice": true,
                            "merchantHandlesConsumerData": true,
                            "appearance": {
                                "displayOptions": {
                                    "showMerchantName": true,
                                    "showOrderSummary": true
                                },
                                "textOptions": {
                                    "completePaymentButtonText": "string"
                                }
                            },
                            "countryCode": "string"
                        },
                        "merchantNumber": "string",
                        "notifications": {
                            "webHooks": [
                                {
                                    "eventName": "string",
                                    "url": "string",
                                    "authorization": "string",
                                    "headers": null
                                }
                            ]
                        },
                        "subscription": {
                            "subscriptionId": "d079718b-ff63-45dd-947b-4950c023750f",
                            "endDate": "2019-08-24T14:15:22Z",
                            "interval": 0
                        },
                        "unscheduledSubscription": {
                            "create": true,
                            "unscheduledSubscriptionId": "92143051-9e78-40af-a01f-245ccdcd9c03"
                        },
                        "paymentMethodsConfiguration": [
                            {
                                "name": "string",
                                "enabled": true
                            }
                        ],
                        "paymentMethods": [
                            {
                                "name": "string",
                                "fee": {
                                    "reference": "string",
                                    "name": "string",
                                    "quantity": 0,
                                    "unit": "string",
                                    "unitPrice": 0,
                                    "taxRate": 0,
                                    "taxAmount": 0,
                                    "grossTotalAmount": 0,
                                    "netTotalAmount": 0
                                }
                            }
                        ],
                        "myReference": "string"
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
                    CURLOPT_SSL_VERIFYPEER, false,
                    CURLOPT_POSTFIELDS => $jsondata,
                    CURLOPT_HTTPHEADER => [
                        "Authorization: test-secret-key-90d47cae99df4ffa8ccf386d9d104441",
                        "CommercePlatformTag: Comerece",
                        "content-type: application/*+json"
                    ],
                    ]);

                    $response = curl_exec($curl);

                    print_r($response);
                    $err = curl_error($curl);

                    curl_close($curl);




?>

                   

                </div>
            </div>

            <div class="row">
                
                <div class="col-md-6 d-flex justify-content-end align-items-end">
                    <button class="btn green_btn">Order Now</button>
                </div>
            </div>
        </div>
    </form>
</div>
</div>

</div>
</div>
</div>

</main>

<section class="hideme overlay">
    <div class="popup">
        <div class="popup_wrapper">
            <div class="order_confirm d-flex position-relative justify-content-center flex-column align-items-center p-4">
                <img src="<?php bloginfo('template_directory'); ?>/reources/images/logo.png" class="logo" alt="logo">

                <div class="step_wrapper d-flex justify-content-center flex-column align-items-center text-center">
                    <div class="content mt-5">
                        <div class="right"><img src="<?php bloginfo('template_directory'); ?>/reources/images/img 3.png" alt=""></div>
                        <h1 class="finished">Finished!</h1>
                        <h2 class="mb-5 mt-5">Your Order has beed submitted!</h2>
                        <a href="<?php echo home_url('/profile/orders'); ?>" class="btn_primary mb-5">View Orders</a>
                    </div>
                </div>

            </div>
            <img src="<?php bloginfo('template_directory'); ?>/reources/images/red cross.png" alt="" class="_cross">
        </div>
    </div>
</section>



<?php get_footer(); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript">
    jQuery(document).ready(function($) {
        $('._cross').click(function() {

            $(".hideme").css("display", "none");
        });

        $("#addmeeting").submit(function(e) {
            e.preventDefault();
            var date = jQuery('#date').val();
            var uid = jQuery('#uid').val();
            var datas = [];
            var newdata = [];
            $("#addmeeting .product-quantity").each(function() {
                var productid = $(this).data('id');
                var value = $(this).val();
                if (value > 1) {
                    datas.push([productid, $(this).val()]);
                }
                newdata.push(datas);
            });
            //alert(newdata[0]);
            var menu_items = newdata[0];
            console.log(menu_items);

            $.ajax({
                type: "POST",
                url: "<?php echo admin_url('admin-ajax.php'); ?>",
                data: {
                    action: "addmeeting",
                    menu_items: menu_items,
                    date: date,
                    uid: uid,
                    order: "Personal"

                },
                success: function(data) {

                    if (data.code == 0) {
                        alert(data.message);
                    } else {
                        $(".overlay").css("display", "flex");
                        // alert(data.message);

                    }
                }

            });
        });


    });
</script>