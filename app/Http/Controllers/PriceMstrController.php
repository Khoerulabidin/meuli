<?php

namespace App\Http\Controllers;

use App\Models\CodeMstr;
use App\Models\PriceDet;
use App\Models\PriceMstr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePriceMstrRequest;
use App\Http\Requests\UpdatePriceMstrRequest;
use App\Models\ItemMstr;

class PriceMstrController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ums = CodeMstr::query()->where('code_mstr_fldname', 'item_um')->get();
        $priceMstrs = PriceMstr::query()->with('userMstr')->get();
        return view('priceMstr.index', compact('priceMstrs', 'ums'));
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
        $data = $request->validate(PriceMstr::rules());
        PriceMstr::validateUnique($data);
        $id = Auth::user()->user_mstr_id;

        PriceMstr::create([
            'price_mstr_nbr' => Str::upper($request->price_mstr_nbr),
            'price_mstr_item' => $request->price_mstr_item,
            'price_mstr_cost' => $request->price_mstr_cost,
            'price_mstr_um' => $request->price_mstr_um,
            'price_mstr_start' => $request->price_mstr_start,
            'price_mstr_expire' => $request->price_mstr_expire,
            'price_mstr_cb' => $id,
        ]);

        return back()->with('success', 'Price berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $items = ItemMstr::query()->get();
        $priceMstr = PriceMstr::query()->with(['userMstr', 'um'])->findOrFail($id);
        $priceDets = PriceDet::query()->with(['userMstr', 'itemMstr', 'um'])->where('price_det_mstr', $id)->get();
        $ums = CodeMstr::query()->where('code_mstr_fldname', 'item_um')->get();
        return view('priceDet.index', compact('priceDets', 'priceMstr', 'ums', 'items'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PriceMstr $priceMstr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $item = PriceMstr::findOrFail($id);

        $data = $request->validate(PriceMstr::rules());
        PriceMstr::validateUnique($data);

        $item->update($data);

        return back()->with('success', 'Item berhasil diupdate.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($pricemstrId)
    {
        $pricemstr = PriceMstr::findOrFail($pricemstrId);
        $pricemstr->delete();
        $message = "price master deleted successfully";

        return redirect()->back()->with('success', $message);
    }
}
