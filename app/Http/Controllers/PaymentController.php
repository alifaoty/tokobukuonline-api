<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $payments = Payment::where('user_id', auth('sanctum')->user()->id)->get();

        return response()->json([
            'success' => 202,
            'data' => $payments
        ], 202);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $payment = new Payment();
        $payment->transaction_id = $request->input('transaction_id');
        $payment->book_id = $request->input('book_id');
        $payment->user_id = auth('sanctum')->user()->id;
        $payment->payment_total = $request->input('payment_total');
        $payment->payment_date = now()->format('Y-m-d');
        $payment->save();

        return response()->json([
            'success' => 201,
            'data' => $payment
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $payment = Payment::find($id);

        if ($payment->user_id == auth('sanctum')->user()->id) {
            return response()->json([
                'success' => 202,
                'data' => $payment
            ], 202);
        }

        return response()->json([
            'success' => 404
        ], 404);
    }
}
