<?php
  require_once('./config.php');

  $token  = $_POST['stripeToken'];
  $email  = $_POST['stripeEmail'];
  $amount = $_POST['amount'];
  $maHD = $_POST['maHD'];

  $customer = \Stripe\Customer::create([
      'email' => $email,
      'source'  => $token,
  ]);

  $charge = \Stripe\Charge::create([
      'customer' => $customer->id,
      'amount'   => $amount,
      'currency' => 'usd',
      "metadata" => ["order_id" => $maHD]
  ]);

  echo '<h1>Successfully charged $50.00!</h1>';
?>