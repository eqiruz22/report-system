<?php

namespace App\Http\Controllers;

use App\Models\Title;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class TitleController extends Controller
{
    public function index()
    {
        return view('dashboard/title/index',[
            'title' => 'Title Form',
            'data' => Title::all()
        ]);
    }

    public function create()
    {
        return view('dashboard/title/create',[
            'title' => 'Create Title'
        ]);
    }

    public function store(Request $request)
    {
        $rule = Validator::make($request->all(),[
            'title' => 'required|unique:titles'
        ],[
            'title.required' => 'Title Name is required',
            'title.unique' => 'Title already created'
        ]);

        if($rule->fails()){
            return Redirect::back()->withErrors($rule)->withInput();
        }

        $data = [
            'title' => $request->input('title')
        ];

        DB::table('titles')->insert($data);
        return redirect('/title');
    }
}
