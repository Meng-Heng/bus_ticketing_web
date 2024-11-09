<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index() {
        $payment = Payment::paginate(10);
        return view('web.backend.component.payment.view')->with('tbl_payment', $payment);
    }
    
}
