<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\Service;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $transactions = Transaction::with('service')->get();
        return view("admin.transaction.index", compact("transactions"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $services = Service::all();
        return view('customer.order', compact('services'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'customer_name' => 'required',
            'phone' => 'required',
            'service_id' => 'required|exists:services,id',
            'weight' => 'required',
        ]);

        $service = Service::findOrFail($validate['service_id']);

        $validate['total_price'] = $service->price * $validate['weight'];

        $validate['invoice_code'] = 'RENT-'.rand(100,999);

        $validate['status'] = 'pending';

        Transaction::create($validate);
        return redirect()->route('service.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $validated = $request->validate([
            'customer_name' => 'required',
            'phone'         => 'required',
            'service_id'    => 'required|exists:services,id',
            'weight'        => 'required|numeric|min:0.1',
        ]);

        $service = Service::findOrFail($validated['service_id']);

        // Hitung total harga murni dengan PHP
        $total_price = $service->price * $validated['weight'];

        // Tampilkan halaman konfirmasi membawa data hitungan
        return view('customer.order_preview', compact('validated', 'service', 'total_price'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }

    public function updateStatus(Request $request, $id)
    {
        $transaction = Transaction::findOrFail( $id );

        $request->validate([
            'status' => 'required',
        ]);

        $transaction->status = $request->status;
        $transaction->save();

        return redirect()->route('transaction.index');
    }
}
