<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function index() {
        $payment = Payment::paginate(15);
        return view('web.backend.component.payment.view')->with('tbl_payment', $payment);
    }

    public function show($id) {
        $payment = Payment::findOrFail($id);
        return view('web.backend.component.payment.detail')->with('tbl_payment', $payment);
    }
}
