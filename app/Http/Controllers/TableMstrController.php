<?php

namespace App\Http\Controllers;

use App\Models\TableMstr;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreTableMstrRequest;
use App\Http\Requests\UpdateTableMstrRequest;
use App\Models\BranchMstr;

class TableMstrController extends Controller
{

    protected $path = 'TableMstr';
    protected $route = 'TableMstrList';
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tableMstrs = TableMstr::orderBy('table_mstr_id')->get();
        $branchMstrs = BranchMstr::orderBy('branch_mstr_id')->get();
        return view($this->path . '.index', compact('tableMstrs', 'branchMstrs'));
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
    public function store(StoreTableMstrRequest $request)
    {
        try {
            $id = Auth::user()->user_mstr_id;
            $data = $request->validate(TableMstr::rules());
            $status = "available";
            TableMstr::create([
                'table_mstr_name' => $request->table_mstr_name,
                'table_mstr_desc' => $request->table_mstr_desc,
                'table_mstr_status' => $status,
                'table_mstr_branch' => $request->table_mstr_branch,
                'table_mstr_cb' => $id,
            ]);

            return redirect($this->route)->with('status', 'Table Master Created Successfully');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(TableMstr $tableMstr)
    {
        return redirect($this->route);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TableMstr $tableMstr)
    {
        return redirect($this->route);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTableMstrRequest $request, $tableMstrId)
    {

        $tablemstr = TableMstr::findOrFail($tableMstrId);
        $request->merge([
            'table_mstr_name' => $request->input('ef_name'),
            'table_mstr_desc' => $request->input('ef_desc'),
            'table_mstr_barcode' => $request->input('ef_barcode'),
            'table_mstr_status' => $request->input('ef_status'),
            'table_mstr_branch' => $request->input('ef_branch'),
        ]);
        $id = Auth::user()->user_mstr_id;
        $data = $request->validate(TableMstr::rules());

        $data = [
            'table_mstr_name' => $request->table_mstr_name,
            'table_mstr_desc' => $request->table_mstr_desc,
            'table_mstr_barcode' => $request->table_mstr_barcode,
            'table_mstr_status' => $request->table_mstr_status,
            'table_mstr_branch' => $request->table_mstr_branch,
            'table_mstr_cb' => $id,
        ];

        $tablemstr->update($data);
        $message = 'Data table master ' . $request->table_mstr_name . ' updated successfully';

        return redirect($this->route)->with('status', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($tableMstrId)
    {
        $tablemstr = TableMstr::findOrFail($tableMstrId);
        $tablemstr->delete();
        $message = 'Data table master ' . $tablemstr->table_mstr_name . ' deleted successfully';
        return redirect($this->route)->with('status', $message);
    }
}
