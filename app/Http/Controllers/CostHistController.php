<?php

namespace App\Http\Controllers;

use App\Models\CostHist;
use App\Http\Requests\StoreCostHistRequest;
use App\Http\Requests\UpdateCostHistRequest;

class CostHistController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $costHists = CostHist::query()->with('userMstr')->get();
        return view('costHist.index', compact('costHists'));
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
    public function store(StoreCostHistRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(CostHist $costHist)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CostHist $costHist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCostHistRequest $request, CostHist $costHist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CostHist $costHist)
    {
        //
    }
}
