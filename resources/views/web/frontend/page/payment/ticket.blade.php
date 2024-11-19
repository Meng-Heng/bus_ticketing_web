<div class="p-3">
    <p class="mb-0 fw-bold h4">Your ticket information</p>
</div>
<div class="boarding-pass">
    @include('web.frontend.page.payment.section.departure_ticket')
</div>
<div class="boarding-pass">
    @include('web.frontend.page.payment.section.return_ticket')
</div>
<hr style="width: 50%; border: 1px solid black;">
<div class="p-3">
    <p class="mb-0 fw-bold h4">Payment</p>
</div>
<div class="boarding-pass ticket-checkout">
    <div class="col p-3">
        <p class="mb-0 fw-bold h4 p-3">TOTAL: {{ $paywayData['currency'] }} {{ $paywayData['amount'] }}</p>
        <div class="row p-3">
            <div class="col">
                <button class="btn text-white w-100" type="button" id="checkout_button" style="background-color: #005B7B">ABA</button>
            </div>
            {{-- <div class="col">
                <button class="btn text-white w-100" type="button" id="woori_checkout" style="background-color: #0067AC;">Woori QR</button>
            </div> --}}
        </div>
    </div>
</div>