<?php

namespace App\Http\Controllers;

use App\Models\CodeMstr;
use App\Models\PriceDet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePriceDetRequest;
use App\Http\Requests\UpdatePriceDetRequest;

class PriceDetController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $priceDets = PriceDet::query()->with(['userMstr', 'priceMstr'])->get();
        $ums = CodeMstr::query()->where('code_mstr_fldname', 'item_um')->get();
        return view('priceDet.index', compact('priceDets', 'ums'));
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

    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->validate(PriceDet::rules());
        PriceDet::validateUnique($data);
        $id = Auth::user()->user_mstr_id;

        PriceDet::create([
            'price_det_mstr' => $request->price_det_mstr,
            'price_det_item' => $request->price_det_item,
            'price_det_cost' => $request->price_det_cost,
            'price_det_um' => $request->price_det_um,
            'price_det_cb' => $id,
        ]);

        return back()->with('success', 'Price berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(PriceDet $priceDet)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PriceDet $priceDet)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePriceDetRequest $request, PriceDet $priceDet)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($pricedetId)
    {
        $pricemstr = PriceDet::findOrFail($pricedetId);
        $pricemstr->delete();
        $message = "price delete deleted successfully";

        return redirect()->back()->with('success', $message);
    }
}
