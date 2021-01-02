<?php
$name=$_POST["name"];
$phone=$_POST["phone"];
 $email=$_POST["email"];
$amount=$_POST["amount"];
include 'instamojo\Instamojo.php';
$api = new Instamojo\Instamojo('test_8154ecf7137f7487d7f85c07e57', 'test_d6550ee20604e0d79a90dc60e80', 'https://test.instamojo.com/api/1.1/');

try {
    $response = $api->paymentRequestCreate(array(
        "purpose" => "Donation",
        "amount" => $amount,
         "send_email"=>true,
         "email"=>$email,
         "buyer_name"=>$name,
         "phone"=>$phone,
         "send_sms"=>true,
         "allow_repeated_payments"=>false,
        "redirect_url" => "http://localhost/Payment-integration/thankyou.php"
        ));
    //print_r($response);
    $pay_url=$response['longurl'];
    header("location:$pay_url");
}
catch (Exception $e) {
    print('Error: ' . $e->getMessage());
}

?>