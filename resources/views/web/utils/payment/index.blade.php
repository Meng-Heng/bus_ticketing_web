<!DOCTYPE html>
<html lang="en">

	<head>
		<title>PayWay Checkout Sample</title>

		<!— Make a copy of this code to paste into your site—>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
		<meta name="author" content="PayWay">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

		<!— end —>
	</head>

	<body>
		<!— Popup Checkout Form —>
			<div id="aba_main_modal" class="aba-modal">
				<!— Modal content —>
				<div class="aba-modal-content">

					<!-- Include PHP class -->
					<?php
						require_once '../app/Providers/PayWayApiCheckout.php';
//                        $item [0]['name'] = 'test1';
//                        $item [0]['quantity'] = '1';
//                        $item [0]['price'] = '1';
//                        $item [1]['name'] = 'test2';
//                        $item [1]['quantity'] = '1';
//                        $item [1]['price'] = '1';
//
//                        $items = base64_encode(json_encode($item));

                        $req_time = time();
                        $merchant_id = ABA_PAYWAY_MERCHANT_ID;
                        $transactionId = time();
                        $amount = '0.01';
                        $firstName = 'Makara';
                        $lastName = 'Prom';
                        $phone = '093630466';
                        $email = 'prom.makara@ababank.com';
                        $return_params = "Hello World!";
//                        $type = "pre-auth";
//                        $payment_option = "abapay";
//                        $shipping = '2';
//                    $continue_success_url = "https://domain.gov.kh/buydomain/PurchasThank";
//                    $type = "PreAuth";
					?>

                        <!-- 
                            Information to send via a form using POST method 
                            - This form will show on ticket table, after payment completed -> tbl_payment
                            - tbl_payment must or must not have this information?
                        -->
					<form method="POST" target="aba_webservice" action="<?php echo PayWayApiCheckout::getApiUrl(); ?>" id="aba_merchant_request">
						<input type="" name="hash" value="<?php echo PayWayApiCheckout::getHash($req_time . $merchant_id . $transactionId . $amount . $firstName  .$lastName .$email .$phone .$return_params); ?>" id="hash"/>
						<input type="" name="tran_id" value="<?php echo $transactionId; ?>" id="tran_id"/>
						<input type="" name="amount" value="<?php echo $amount; ?>" id="amount"/>
						<input type="" name="firstname" value="<?php echo $firstName; ?>"/>
						<input type="" name="lastname" value="<?php echo $lastName; ?>"/>
						<input type="" name="phone" value="<?php echo $phone; ?>"/>
						<input type="" name="email" value="<?php echo $email; ?>"/>
<!--                        <input ype="hidden" name="items" value="--><?php //echo $items; ?><!--" id="items"/>-->
                        <input type="" name="return_params" value="<?php echo $return_params; ?>"/>
<!--                        <input type="hidden" name="shipping" value="--><?php //echo $shipping; ?><!--"/>-->
                       <!-- <input type="hidden" name="payment_option" value="abapay"/> -->
<!--                        <input type="hidden" name="payment_option" value="--><?php //echo $payment_option;?><!--"/>-->
                       <!-- <input type="hidden" name="currency" value="USD"/> -->
<!--                        <input type="hidden" name="type" value="--><?php //echo $type; ?><!--"/>-->
<!--                        <input type="hidden" name="return_url" value="test.com.kh"/>-->
<!--                        <input type="hidden" name="payment_gate" value="0"/>-->
                        <input type="hidden" name="merchant_id" value="<?php echo $merchant_id; ?>"/>
                        <input type="" name="req_time" value="<?php echo $req_time; ?>"/>
<!--                        <input type="hidden" name="continue_success_url" value="--><?php //echo $continue_success_url; ?><!--"/>-->
<!--                        <input type="hidden" name="return_param" value="Hello, It's me!"/>-->
                    </form>
				</div>
				<!— end Modal content—>
			</div>
		<!— End Popup Checkout Form —>




        <!-- 
            This is when the User has all the information regarding the bus ticket
    
        -->
		<!— Page Content —>
		<div class="container" style="margin-top: 75px;margin: 0 auto;">
			<div style="width: 200px;margin: 0 auto;">
				<h2>TOTAL: $0.01</h2>
				<input type="button" id="checkout_button" value="Checkout Now">
			</div>
		</div>
		<!— End Page Content —>

		<!— Make a copy this javaScript to paste into your site—>
		<!— Note: these javaScript files are using for only integration testing—>

<!--		<link rel="stylesheet" href="https://payway-staging.ababank.com/checkout-popup.html?file=css"/>-->
		<script src="https://checkout.payway.com.kh/plugins/checkout2-0.js"></script>
		<!— These javaScript files are using for only production —>
		<!-- <link rel="stylesheet" href="https://payway.ababank.com/checkout-popup.html?file=css"/>
		<script src="https://payway.ababank.com/checkout-popup.html?file=js"></script> -->

		<script>
			$(document).ready(function () {
				$('#checkout_button').click(function () {
					AbaPayway.checkout();
				});
			});
		</script>
		<!— End —>
	</body>
</html>
