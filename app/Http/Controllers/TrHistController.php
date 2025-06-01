<?php

namespace App\Http\Controllers;

use App\Models\TrHist;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreTrHistRequest;
use App\Http\Requests\UpdateTrHistRequest;

class TrHistController extends Controller
{
    protected $path = 'TrHists';
    protected $route = 'TrHists';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $trHists = TrHist::all();
        return view('TrHist.index', compact('trHists'));
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
    public function store(StoreTrHistRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(TrHist $trHist)
    {
        return redirect($this->route);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TrHist $trHist)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTrHistRequest $request, TrHist $trHist)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TrHist $trHist)
    {
        $trhist->delete();
        return redirect($this->route)->with('success', 'Tr hist berhasil dihapus.');
    }
}
