<html lang="en">
	<head>
		<title>PayWay</title>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
		<meta name="author" content="PayWay">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
	</head>

	<body>
        <div class="container" style="margin: auto;">
			<form method="POST" target="aba_webservice" action="{{config('payway.api_url')}}" id="aba_merchant_request">
				@csrf
				<input type="hidden" name="req_time" value="{{ $paywayData['req_time'] }}" id="req_time"/>
				<input type="hidden" name="tran_id" value="{{ $paywayData['tran_id'] }}" id="tran_id"/>
				<input type="hidden" name="merchant_id" value="{{ $paywayData['merchant_id'] }}" id="merchant_id"/>
				<input type="hidden" name="amount" value="{{ $paywayData['amount'] }}" id="amount"/>
				<input type="hidden" name="items" value="{{ $paywayData['items'] }}" id="items"/>
				<input type="hidden" name="firstname" value="{{ $paywayData['firstname'] }}" id="firstname"/>
				<input type="hidden" name="phone" value="{{ $paywayData['phone'] }}"/>
				<input type="hidden" name="payment_option" value="{{ $paywayData['payment_option'] }}" id="payment_option"/>
				<input type="hidden" name="return_url" value="{{ $paywayData['return_url'] }}" id="return_url"/>
				<input type="hidden" name="continue_success_url" value="{{ $paywayData['continue_success_url'] }}"/>
				<input type="hidden" name="currency" value="{{ $paywayData['currency'] }}" id="currency"/>
				<input type="hidden" name="return_params" value="{{ $paywayData['return_params'] }}" id="return_params"/>
				<input type="hidden" name="hash" value="{{ $paywayData['hash'] }}" id="hash"/>
			</form>
		</div>
	</body>
</html>