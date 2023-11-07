<?php
session_start();
require_once("../classes/Pay.php");
include_once("../utilities/sanitizer.php");
// var_dump($_SESSION);
if ($_POST) {
    $reference = $_POST["reference"];
    $order_id = $_POST["order_id"];
    // initialize paystack API
    $curl = curl_init();

    curl_setopt_array($curl, array(
        CURLOPT_URL => "https://api.paystack.co/transaction/verify/$reference",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer sk_test_c4d573b56b88d92b8203167b703882ac2b221bae",
            "Cache-Control: no-cache",
        ),
    ));
   
    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);
   
    if ($err) {
        // Handle cURL error
        echo "cURL Error #:" . $err;
        
    } else {
        $res = json_decode($response);
        $response = $res->data;
        $f_response = json_encode($response);

        // echo json_encode($response->reference.$response->amount. $order_id. $response->status.$f_response. $response->paid_at);
        // Insert payment in database and Handle payment insertion failure
        $pay1 = new Pay();
        $payment = $pay1->insert_payment($response->reference,$response->amount / 100, $order_id,$response->status,$f_response,$response->paid_at);
        if($payment) {
            if ($response->status == "success") {
                $final_response = [
                    "success" => true,
                    "message" => "Payment Successful!",
                ];
            } else {
                $final_response = [
                    "success" => false,
                    "message" => "Payment Failed",
                ];
            }
        } else {
            $final_response = [
                "success" => false,
                "message" => "Payment Insertion Failed",
            ];
        }

        echo json_encode($final_response);
    }
    unset($_SESSION["cart"]);
}
?>














