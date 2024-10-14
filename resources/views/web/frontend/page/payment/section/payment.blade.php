{{-- <div class="payment">
    <div class="col">
        <div class="p-3">
            <p class="mb-0 fw-bold h4">Payment Methods</p>
        </div>
    </div>
    <div class="col-12">
        <div class="card p-3">
            <div class="card-body border p-0">
                <p>
                    <a class="btn btn-primary w-100 h-100 d-flex align-items-center justify-content-between"
                        data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="true"
                        aria-controls="collapseExample">
                        <span class="fw-bold">Bakong QR</span>
                        <span class="fab fa-cc-paypal">
                        </span>
                    </a>
                </p>
                <div class="collapse p-3 pt-0" id="collapseExample">
                    <div class="row">
                        <div class="col-8">
                            <p class="h4 mb-0">Summary</p>
                            <p class="mb-0">
                                <span class="fw-bold">Product: </span>
                                <span class="c-green">Name of product</span>
                            </p>
                            <p class="mb-0">
                                <span class="fw-bold">Price:</span><span class="c-green"> {{$departure_seat['departureSeatCount'] * $departure_data['price']->price}}</span>
                            </p>
                            <img src="{{asset('images/background/payment/bakong-qr-code.png')}}" alt="" width="20%" height="50%">
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-body border p-0">
                <p>
                    <a class="btn btn-primary p-2 w-100 h-100 d-flex align-items-center justify-content-between"
                        data-bs-toggle="collapse" href="#collapseExample" role="button" aria-expanded="true"
                        aria-controls="collapseExample">
                        <span class="fw-bold">Credit Card</span>
                        <span class="">
                            <span class="fab fa-cc-amex"></span>
                            <span class="fab fa-cc-mastercard"></span>
                            <span class="fab fa-cc-discover"></span>
                        </span>
                    </a>
                </p>
                <div class="collapse show p-3 pt-0" id="collapseExample">
                    <div class="row">
                        <div class="col-lg-5 mb-lg-0 mb-3">
                            <p class="h4 mb-0">Summary</p>
                            <p class="mb-0"><span class="fw-bold">Product:</span><span class="c-green">: Name of
                                    product</span>
                            </p>
                            <p class="mb-0">
                                <span class="fw-bold">Price:</span>
                                <span class="c-green">:$452.90</span>
                            </p>
                            <p class="mb-0">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Atque
                                nihil neque
                                quisquam aut
                                repellendus, dicta vero? Animi dicta cupiditate, facilis provident quibusdam ab
                                quis,
                                iste harum ipsum hic, nemo qui!</p>
                        </div>
                        <div class="col-lg-7">
                            <form action="" class="form">
                                <div class="row">
                                    <div class="col-12">
                                        <div class="form__div">
                                            <input type="text" class="form-control" placeholder=" ">
                                            <label for="" class="form__label">Card Number</label>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form__div">
                                            <input type="text" class="form-control" placeholder=" ">
                                            <label for="" class="form__label">MM / yy</label>
                                        </div>
                                    </div>

                                    <div class="col-6">
                                        <div class="form__div">
                                            <input type="password" class="form-control" placeholder=" ">
                                            <label for="" class="form__label">cvv code</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form__div">
                                            <input type="text" class="form-control" placeholder=" ">
                                            <label for="" class="form__label">name on the card</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="btn btn-primary w-100">Sumbit</div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary payment">Make Payment</button>
        </div>
    </div>
    <div class="col-12">
    </div>
</div> --}}

<div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="paymentModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="paymentModalLabel">{{__("Scan to pay")}}</h5>
                <button  type="button" data-mdb-button-init data-mdb-ripple-init class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img src="" id="image" alt="">
                
            </div>
        </div>
    </div>
</div>

{{-- <form id="qrForm">
    <label>Amount:</label>
    <input type="number" id="amount" name="amount">
    <label>Mobile Number:</label>
    <input type="text" id="mobileNumber" name="mobileNumber">
    <button type="button" onclick="generateQR()">Generate QR Code</button>
</form>

<div id="qrCodeOutput"></div> --}}
