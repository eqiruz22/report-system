<?php

namespace App\Http\Controllers;

use App\Models\StatusProject;
use App\Models\Report;
use App\Models\Status;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class StatusProjectController extends Controller
{
    
    public function index()
    {
        return view('dashboard/statusproject/index',[
            'title' => 'Status Project',
            'data' => StatusProject::with(['user','report','status'])->latest()->statussearch(request(['search']))->paginate(10),
            'user' => User::all()
        ]);
    }

    public function create()
    {
        return view('dashboard/statusproject/create',[
            'title' => 'Create Status Project',
            'report' => Report::all(),
            'stats' => Status::all() 
        ]);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'user_id' => 'required',
            'status_id' => 'required',
            'report_id' => 'required|unique:status_projects'
        ],[
            'report_id.required' => 'PRJ Form cannot be empty, Please choose one',
            'report_id.unique' => 'PRJ is already created by another user',
            'status_id.required' => 'Status PRJ cannot be empty, Please choose one'
        ]);


        StatusProject::create($validate);
        return redirect('/status-project')->with('success','Success Create Status!');
    }

    public function edit(StatusProject $data)
    {
        return view('dashboard/statusproject/edit',[
            'title' => 'Edit Status Project',
            'data' => $data,
            'list' => Report::all(),
            'stats' => Status::all()
        ]); 
    }

    public function update(Request $request, StatusProject $data)
    {
       $rule = [
            'user_id' => 'required',
            'status_id' => 'required'
       ];

       if($request->report_id != $data->report_id){
            $rule['report_id'] = ['required','unique:status_projects'];
       }
       
        $validated = $request->validate($rule);

        StatusProject::where('id',$data->id)->update($validated);
        return redirect('/status-project')->with('success','Update Status Project Success!');
    }

    public function destroy($id)
    {
        StatusProject::destroy($id);
        return redirect('/status-project');
    }
}
