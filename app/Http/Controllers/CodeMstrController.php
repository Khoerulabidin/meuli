<?php

namespace App\Http\Controllers;

use App\Models\CodeMstr;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCodeMstrRequest;
use App\Http\Requests\UpdateCodeMstrRequest;

class CodeMstrController extends Controller
{

    protected $path = 'CodeMstr';
    protected $route = 'CodeMstrList';

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $codeMstrs = CodeMstr::orderBy('code_mstr_fldname')->get();
        return view($this->path . '.index', compact('codeMstrs'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return redirect($this->route);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCodeMstrRequest $request)
    {
        //
        try {
            $id = Auth::user()->user_mstr_id;
            $data = $request->validate(CodeMstr::rules());

            CodeMstr::validateUnique($data);

            CodeMstr::create([
                'code_mstr_fldname' => Str::lower($request->code_mstr_fldname),
                'code_mstr_value' => $request->code_mstr_value,
                'code_mstr_cmmt' => $request->code_mstr_cmmt,
                'code_mstr_cmmt2' => $request->code_mstr_cmmt2,
                'code_mstr_cb' => $id,
            ]);

            return redirect($this->route)->with('status', 'Code Master Created Successfully');
        } catch (\Exception $e) {

            return redirect()->back()->withInput();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(CodeMstr $codeMstr)
    {
        //
        return redirect($this->route);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(CodeMstr $codeMstr)
    {
        //
        return redirect($this->route);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCodeMstrRequest $request, $codeMstrId)
    {
        $codemaster = CodeMstr::findOrFail($codeMstrId);
        $request->merge([
            'code_mstr_fldname' => $request->input('ef_fldname'),
            'code_mstr_value' => $request->input('ef_value'),
            'code_mstr_cmmt' => $request->input('ef_cmmt'),
            'code_mstr_cmmt2' => $request->input('ef_cmmt2'),
        ]);
        $id = Auth::user()->user_mstr_id;
        $data = $request->validate(CodeMstr::rules());

        CodeMstr::validateUnique($data, $codemaster->code_mstr_id);

        $data = [
            'code_mstr_fldname' => $request->code_mstr_fldname,
            'code_mstr_value' => $request->code_mstr_value,
            'code_mstr_cmmt' => $request->code_mstr_cmmt,
            'code_mstr_cmmt2' => $request->code_mstr_cmmt2,
            'code_mstr_cb' => $id,
        ];

        $codemaster->update($data);
        $message = 'Data code master ' . $request->code_mstr_value . ' updated successfully';

        return redirect($this->route)->with('status', $message);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($codemasterId)
    {
        //
        $codemaster = CodeMstr::findOrFail($codemasterId);
        $codemaster->delete();
        $message = "Code master deleted successfully";

        return redirect($this->route)->with('status', $message);
    }
}
