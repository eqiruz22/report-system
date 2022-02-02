<?php

namespace App\Http\Controllers;

use App\Models\Status;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StatusController extends Controller
{
    public function index()
    {
        return view('dashboard/status/index',[
            'title' => 'Status Table',
            'data' => Status::all()
        ]);
    }

    public function create()
    {
        return view('dashboard/status/create',[
            'title' => 'Create Status'
        ]);
    }

    public function store(Request $request)
    {
        $rule = $request->validate([
            'stats' => 'required|unique:status'
        ],[
            'stats.required' => 'This status is required',
            'stats.unique' => 'This status is already created'
        ]);

        DB::table('status')->insert($rule);
        return redirect('/status');
    }

    public function edit($id)
    {

    }

    public function destroy($id)
    {
        Status::destroy($id);
        return redirect('/status');
    }
}
