<?php
require 'vendor/autoload.php'; // Include Stripe's PHP library

\Stripe\Stripe::setApiKey('YOUR_STRIPE_SECRET_KEY');

if (isset($_POST['payment'])) {
    $token = $_POST['stripeToken'];
    $amount = $_POST['amount'];

    try {
        $charge = \Stripe\Charge::create([
            'amount' => $amount * 100, // Amount in cents
            'currency' => 'usd',
            'source' => $token,
            'description' => 'Payment for Safari Chap'
        ]);

        echo "Payment successful!";
    } catch (\Stripe\Exception\CardException $e) {
        echo "Payment failed: " . $e->getMessage();
    }
}
?>
