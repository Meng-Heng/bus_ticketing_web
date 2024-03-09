<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $payment = Payment::all();
        return views('payment.index', compact('payment'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return views('payment.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $payment = new Payment();
        $payment->method = $request->input('method');
        $payment->save();
        return redirect('/payments');
    }

    /**
     * Display the specified resource.
     */
    public function show(Payment $payment)
    {
        return views('payment.show', compact('payment'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Payment $payment)
    {
        return views('payment.edit', compact('payment'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Payment $payment)
    {
        $payment->method = $request->input('method');
        $payment->save();
        return redirect('/payments');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Payment $payment)
    {
        $payment->delete();
        return redirect('/payments');
    }
}
