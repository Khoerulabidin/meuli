<?php

namespace App\Http\Controllers;

use App\Models\StockDet;
use App\Http\Requests\StoreStockDetRequest;
use App\Http\Requests\UpdateStockDetRequest;

class StockDetController extends Controller
{

    protected $path = 'StockDet';
    protected $route = 'StockDetList';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stockDets = StockDet::with(['itemMstr.um', 'userMstr'])
            ->orderBy('stock_det_item')
            ->get();
        return view($this->path . '.index', compact('stockDets'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStockDetRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(StockDet $stockDet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(StockDet $stockDet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStockDetRequest $request, StockDet $stockDet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(StockDet $stockDet)
    {
        //
    }
}
