<?php

namespace App\Http\Controllers;

use App\Models\BranchMstr;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreBranchMstrRequest;
use App\Http\Requests\UpdateBranchMstrRequest;

class BranchMstrController extends Controller
{
    protected $path = 'BranchMstr';
    protected $route = 'BranchMstrs';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $branchMstrs = BranchMstr::all();
        return view('BranchMstr.index', compact('branchMstrs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return redirect($this->route);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBranchMstrRequest $request)
    {
        $id = Auth::user()->user_mstr_id;

        $validated = $request->validate([
            'branch_mstr_name' => 'required|string|max:255',
            'branch_mstr_joined' => 'required|date',
            'branch_mstr_addr1' => 'required|string',
            'branch_mstr_addr2' => 'nullable|string',
            'branch_mstr_telp' => 'required|string|max:25',
            'branch_mstr_fax' => 'required|string|max:255',
            'branch_mstr_email' => 'nullable|email',
            'branch_mstr_pic' => 'required|string|max:255',
            'branch_mstr_sosmed1' => 'nullable|string|max:255', //instagram
            'branch_mstr_sosmed2' => 'nullable|string|max:255', //facebook
            'branch_mstr_sosmed3' => 'nullable|string|max:255', //X
            'branch_mstr_sosmed4' => 'nullable|string|max:255', //tiktok\

            'branch_mstr_profile' => 'nullable', 
            'branch_mstr_img' => 'nullable',
        ]);

        $validated['branch_mstr_cb'] = $id;
        // dd($validated);

        BranchMstr::create($validated);

        return redirect($this->route)->with('success', 'Cabang berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(BranchMstr $branchMstr)
    {
        return redirect($this->route);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(BranchMstr $branchMstr)
    {
        return redirect($this->route);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBranchMstrRequest $request, BranchMstr $branchMstr)
    {
        // dd($request->all());
        // $id = Auth::user()->user_mstr_id;

        // $validated = $request->validate([
        //     'branch_mstr_name' => 'required|string|max:255',
        //     'branch_mstr_joined' => 'required|date',
        //     'branch_mstr_addr1' => 'required|string',
        //     'branch_mstr_addr2' => 'nullable|string',
        //     'branch_mstr_telp' => 'required|string|max:25',
        //     'branch_mstr_fax' => 'required|string|max:255',
        //     'branch_mstr_email' => 'nullable|email',
        //     'branch_mstr_pic' => 'required|string|max:255',
        //     'branch_mstr_sosmed1' => 'nullable|string|max:255', //instagram
        //     'branch_mstr_sosmed2' => 'nullable|string|max:255', //facebook
        //     'branch_mstr_sosmed3' => 'nullable|string|max:255', //X
        //     'branch_mstr_sosmed4' => 'nullable|string|max:255', //tiktok\

        //     'branch_mstr_profile' => 'nullable', 
        //     'branch_mstr_img' => 'nullable',
        // ]);


        $validated = $request->validated(); 
    
        $validated['branch_mstr_cb'] = Auth::user()->user_mstr_id;

        $branchMstr->update($validated);

        return redirect($this->route)->with('success', 'Cabang berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(BranchMstr $branchMstr)
    {
        $branchMstr->delete();
        return redirect($this->route)->with('success', 'Cabang berhasil dihapus.');
    }
}
