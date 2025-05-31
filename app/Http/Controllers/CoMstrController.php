<?php

namespace App\Http\Controllers;

use App\Models\CoMstr;
use App\Http\Requests\StoreCoMstrRequest;
use App\Http\Requests\UpdateCoMstrRequest;
use App\Models\ItemMstr;

class CoMstrController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    protected $path = 'CoMstr';
    protected $route = 'CoMstrList';

    public function index()
    {
        $itemMstr = ItemMstr::orderBy('item_mstr_code', 'asc')
            ->get()
            ->map(function ($item) {
                if (is_string($item->item_mstr_spec)) {
                    $item->item_mstr_spec = json_decode($item->item_mstr_spec, true);
                }
                return $item;
            });
        return view($this->path . '.index', compact(['itemMstr']));
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
    public function store(StoreCoMstrRequest $request)
    {
        dd($request->all());
    }

    /**
     * Display the specified resource.
     */
    public function show(CoMstr $coMstr)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CoMstr $coMstr)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCoMstrRequest $request, CoMstr $coMstr)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(CoMstr $coMstr)
    {
        //
    }
}
