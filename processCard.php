<?php
/*
 * @Author: Mwai
 * @card processing
 */

include 'db.php';
include 'functions.php';
$session_price = $_SESSION['session_price'];

if($_SERVER["REQUEST_METHOD"] == "POST") {
	$card_number = str_replace("+", "", $_POST['card_number']);
	$card_name = $_POST['card_name'];
	$expiry_month = $_POST['expiry_month'];
	$expiry_year = $_POST['expiry_year'];
	$cvv = $_POST['cvv'];
	$expirationDate = $expiry_month.'/'.$expiry_year;

	require_once 'braintree/Braintree.php';
	Braintree_Configuration::environment('sandbox');
	Braintree_Configuration::merchantId('c3fr99c6f828xkhj');
	Braintree_Configuration::publicKey('zfds4bj68jhqf7yx');
	Braintree_Configuration::privateKey('78bcaaf8f342cf05971b0a30fcef20e3';);

	$result = Braintree_Transaction::sale(array(
		'amount' => $price,
		'creditCard' => array(
			'number' => $card_number,
			'cardholderName' => $card_name,
			'expirationDate' => $expiryDate,
			'cvv' => $cvv)));

	if ($result->success) {
		if($result->transaction->id) {
			$braintreeCode=$result->transaction->id;
			updateUserOrder($braintreeCode, $session_user_id);
		}

	}
	else if ($result->transaction) {
		echo '{"OrderStatus": [{"status":"2"}]}';
	}
	else {
		echo '{"OrderStatus": [{"status":"0"}]}';
	}
}
?>