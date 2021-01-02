<!DOCTYPE html>
<html lang="en">
<head>
  <title>ThankYou</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  
</head>
<body>

<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <!-- Brand/logo -->
  <a class="navbar-brand" href="#">Home</a>
  
  <!-- Links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" href="#">About</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">Services</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#">ContactUs</a>
    </li>
  </ul>
</nav>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
<h1 class="text-center">Thank You For Your Donation</h1>
<?php
include 'instamojo\Instamojo.php';
$api = new Instamojo\Instamojo('test_8154ecf7137f7487d7f85c07e57', 'test_d6550ee20604e0d79a90dc60e80', 'https://test.instamojo.com/api/1.1/');
$payid=$_GET["payment_request_id"];
try{
    $response=$api->paymentRequestStatus($payid);
    ?>
    <h2>Payment Details:</h2>
    <table class="table table-bordered">
    <tr>
         
         <th> You have donated:</th>
         <td><?=$response["amount"];?></td>
      </tr> 
        <tr>
         
           <th> Payment ID:</th>
           <td><?=$response["payments"][0]["payment_id"];?></td>
        </tr> 
        <tr>
         
         <th> Payee Name:</th>
         <td><?=$response["payments"][0]["buyer_name"];?></td>
      </tr> 

      <tr>
         
         <th> Email:</th>
         <td><?=$response["payments"][0]["buyer_email"];?></td>
      </tr> 
      <tr>
         
         <th> Phone:</th>
         <td><?=$response["phone"];?></td>
      </tr> 
</table>
    
    <?php
    
}
catch(Exception $e)
{
    print("Error:".$e->getMessage());
}
?>
 
</div>
</div>
   
</div>

</body>
</html>
