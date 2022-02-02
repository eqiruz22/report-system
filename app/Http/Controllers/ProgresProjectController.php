<?php

namespace App\Http\Controllers;

use App\Models\ProgresProject;
use App\Models\Report;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Carbon;


class ProgresProjectController extends Controller
{
    public function index()
    {
        return view('dashboard/progresproject/index',[
            'title' => 'Progres Project',
            'data' => ProgresProject::with(['user','report'])->latest()->progressearch(request(['search']))->paginate(10)
        ]);
    }

    public function create()
    {
        return view('dashboard/progresproject/create',[
            'title' => 'Create Progres Project',
            'data' => Report::all()
        ]);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'user_id' => 'required',
            'report_id' => 'required|unique:progres_projects',
            'no_rpo' => 'required|unique:progres_projects',
            'rpo' => 'nullable',
            'deliver_barang' => 'nullable',
            'bast' => 'nullable',
            'file_rpo' => ['nullable','mimes:pdf,csv,xls,xlsx,doc,docx','max:5024'],
            'file_bast' => ['nullable','mimes:pdf,csv,xls,xlsx,doc,docx','max:5024'],
            'remarks' => 'nullable'
        ],[
            'report_id.required' => 'PRJ Form cannot be empty, Please choose one',
            'report_id.unique' => 'PRJ is already created by another user',
            'file_rpo.mimes' => 'Document RPO must be this valid extensions pdf,csv,xls,xlsx,doc,docx',
            'file_rpo.max' => 'Maximum Document RPO upload is 5MB',
            'file_bast.mimes' => 'Document BAST must be this valid extensions pdf,csv,xls,xlsx,doc,docx',
            'file_bast.max' => 'Maximum Document BAST upload is 5MB',
            'no_rpo.required' => 'Nomor RPO cannot be empty',
            'no_rpo.unique' => 'Nomor RPO is already created by another user'
        ]);

        if($request->file('file_rpo')){
            $rponame = $request->file('file_rpo')->getClientOriginalName();
            $validate['file_rpo'] = $request->file('file_rpo')->storeAs('docs-rpo-bast',$rponame);
        }

        if($request->file('file_bast')){
            $bastname = $request->file('file_bast')->getClientOriginalName();
            $validate['file_bast'] = $request->file('file_bast')->storeAs('docs-rpo-bast',$bastname);
        }

        ProgresProject::create(str_replace("docs-rpo-bast/","",$validate));
        return redirect('/progres-project')->with('success','Success Create Progres Project');
    }

    public function edit($id)
    {
        return view('dashboard/progresproject/edit',[
            'title' => 'Edit Progres Project',
            'data' => ProgresProject::findOrFail($id),
            'list' => Report::all()
        ]);
    }

    public function update(Request $request, ProgresProject $data)
    {
        $rule = [
            'user_id' => 'required',
            'rpo' => 'nullable',
            'deliver_barang' => 'nullable',
            'bast' => 'nullable',
            'remarks' => 'nullable',
            'file_rpo' => 'nullable|mimes:pdf,csv,xls,xlsx,doc,docx|max:5024',
            'file_bast' => 'nullable|mimes:pdf,csv,xls,xlsx,doc,docx|max:5024'
        ];

        if($request->report_id != $data->report_id){
            $rule['report_id'] = ['required','unique:progres_projects'];
        }
        if($request->no_rpo != $data->no_rpo){
            $rule['no_rpo'] = ['required','unique:progres_projects'];
        }

        if($request->file('file_rpo')){
            if($request->oldRpo){
                Storage::delete('docs-rpo-bast/'.$request->oldRpo);
            }
            $filename = $request->file('file_rpo')->getClientOriginalName();
            $validate['file_rpo'] = $request->file('file_rpo')->storeAs('docs-rpo-bast',$filename);
        }

        if($request->file('file_bast')){
            if($request->oldBast){
                Storage::delete('docs-rpo-bast/'.$request->oldBast);
            }
            $filename = $request->file('file_bast')->getClientOriginalName();
            $validate['file_bast'] = $request->file('file_bast')->storeAs('docs-rpo-bast',$filename);
        }

        $validate = $request->validate($rule,[
            'file_rpo.mimes' => 'Document RPO must be this valid extensions pdf,csv,xls,xlsx,doc,docx',
            'file_rpo.max' => 'Maximum Document RPO upload is 5MB',
            'file_bast.mimes' => 'Document BAST must be this valid extensions pdf,csv,xls,xlsx,doc,docx',
            'file_bast.max' => 'Maximum Document BAST upload is 5MB',
            'report_id.required' => 'PRJ cannot be empty',
            'report_id.unique' => 'This PRJ already created by another user',
            'no_rpo.required' => 'Nomor RPO cannot be empty',
            'no_rpo.unique' => 'Nomor RPO already created by another user'
        ]);
        ProgresProject::where('id',$data->id)->update(str_replace("docs-rpo-bast/","",$validate));
        return redirect('/progres-project')->with('success','Update Progres Project Success');
    }

    public function destroy(ProgresProject $data)
    {
        if($data->file_rpo){
            Storage::delete('docs-rpo-bast/'.$data->file_rpo);
        }
        if($data->file_bast){
            Storage::delete('docs-rpo-bast/'.$data->file_bast);
        }
        ProgresProject::destroy($data->id);
        return redirect('/progres-project');
    }
}