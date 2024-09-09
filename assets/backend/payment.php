<?php
require 'vendor/autoload.php'; // Include Stripe's PHP library

\Stripe\Stripe::setApiKey('YOUR_STRIPE_SECRET_KEY');

if (isset($_POST['payment'])) {
	$token = $_POST['stripeToken'];
	$amount = $_POST['amount'];
	$payment_method = $_POST['payment_method']; // Get the selected payment method

	try {
		switch ($payment_method) {
			case 'mpesa':
				// M-Pesa payment logic
				$charge = \Stripe\Charge::create([
					'amount' => $amount * 100, // Amount in cents
					'currency' => 'usd',
					'source' => $token,
					'description' => 'Payment via M-Pesa for Safari Chap'
				]);
				echo "Payment successful via M-Pesa!";
				break;

			case 'airtel':
				// Airtel Money payment logic (placeholder)
				echo "Airtel Money payment processing... (integration needed)";
				break;

			case 'tigo':
				// Tigo Pesa payment logic (placeholder)
				echo "Tigo Pesa payment processing... (integration needed)";
				break;

			case 'halopesa':
				// HaloPesa payment logic (placeholder)
				echo "HaloPesa payment processing... (integration needed)";
				break;

			default:
				echo "Invalid payment method selected.";
		}
	} catch (\Stripe\Exception\CardException $e) {
		echo "Payment failed: " . $e->getMessage();
	}
}
?>

