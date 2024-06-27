<?php

namespace App\Http\Controllers;

use App\Models\Detail_Transaction;
use App\Http\Requests\StoreDetailTransactionRequest;
use App\Http\Requests\UpdateDetailTransactionRequest;

class DetailTransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $detailtransactions = Category::all();
        return view('detailtransaction.list', [
            'data' => $detailtransactions,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('detailtransaction.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreDetailTransactionRequest $request)
    {
        DetailTransaction::create($request->all());

        return redirect('/detailtransactions');
    }

    /**
     * Display the specified resource.
     */
    public function show(DetailTransaction $detailTransaction)
    {
        return view('detailtransaction.add', [
            'data' => $detailTransaction,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DetailTransaction $detailTransaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateDetailTransactionRequest $request, DetailTransaction $detailTransaction)
    {
        $detailTransaction->fill($request->all());
    

        return redirect('/detailtransactions');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete(DetailTransaction $detailTransaction)
    {
        $detailTransaction->delete();
        
        return redirect('/detailtransactions');
    }
}
