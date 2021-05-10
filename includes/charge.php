<?php
  require_once('./config.php');

  $token  = $_POST['stripeToken'];
  $email  = $_POST['stripeEmail'];
  $tongtien = $_POST['tongtien'];
  $taikhoan = $_SESSION['taikhoan'];
  $ngaydat = date("Y-m-d");

  $customer = \Stripe\Customer::create([
      'email' => $email,
      'source'  => $token,
  ]);

  $charge = \Stripe\Charge::create([
      'customer' => $customer->id,
      'amount'   => $tongtien,
      'currency' => 'usd',
      "metadata" => ["order_id" => $maHD]
  ]);

?>