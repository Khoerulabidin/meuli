<?php

namespace App\Http\Controllers;

use App\Models\CodeMstr;
use App\Models\ItemMstr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\StoreItemMstrRequest;
use App\Http\Requests\UpdateItemMstrRequest;

class ItemMstrController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cats = CodeMstr::where('code_mstr_fldname', 'item_cat')->get();
        $ums = CodeMstr::where('code_mstr_fldname', 'item_um')->get();
        $itemMstrs = ItemMstr::query()->with(['userMstr', 'um', 'cat'])->get();
        return view('itemMstr.index', compact('itemMstrs', 'cats', 'ums'));
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
        $data = $request->validate(ItemMstr::rules());
        ItemMstr::validateUnique($data);
        $id = Auth::user()->user_mstr_id;

        $img = null;

        if ($request->hasFile('item_mstr_img')) {
            $file = $request->file('item_mstr_img');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/images'), $filename);

            $img = $filename; // simpan nama file saja ke database

        }

        ItemMstr::create([
            'item_mstr_code' => Str::upper($request->item_mstr_code),
            'item_mstr_desc' => $request->item_mstr_desc,
            'item_mstr_spec' => $request->item_mstr_spec,
            'item_mstr_cat' => $request->item_mstr_cat,
            'item_mstr_um' => $request->item_mstr_um,
            'item_mstr_img' => $img,
            'item_mstr_cb' => $id,
        ]);

        return back()->with('success', 'Item berhasil ditambahkan.');
    }

    public function update(Request $request, $id)
    {
        $item = ItemMstr::findOrFail($id);

        $data = $request->validate(ItemMstr::rules());
        ItemMstr::validateUnique($data);

        if ($request->hasFile('item_mstr_img')) {
            // Optional: delete old image
            if ($item->item_mstr_img && file_exists(public_path('assets/image/' . $item->item_mstr_img))) {
                unlink(public_path('assets/image/' . $item->item_mstr_img));
            }
            $file = $request->file('item_mstr_img');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('assets/image'), $filename);

            $data['item_mstr_img'] = $filename; // simpan nama file saja ke database
        }

        $data['item_mstr_spec'] = json_encode($data['item_mstr_spec']);

        $item->update($data);

        return back()->with('success', 'Item berhasil diupdate.');
    }

    /**
     * Display the specified resource.
     */
    public function show(ItemMstr $itemMstr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ItemMstr $itemMstr)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($itemmstrId)
    {
        $itemmstr = ItemMstr::findOrFail($itemmstrId);
        if ($itemmstr->item_mstr_img && File::exists(public_path('assets/images/' . $itemmstr->item_mstr_img))) {
            File::delete(public_path('assets/images/' . $itemmstr->item_mstr_img));
        }
        $itemmstr->delete();
        $message = "item master deleted successfully";

        return redirect()->back()->with('success', $message);
    }
}
