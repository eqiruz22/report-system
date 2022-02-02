<?php

namespace App\Http\Controllers;

use App\Models\Title;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;


class UserController extends Controller
{
    public function index()
    {
        $this->authorize('admin');
        return view('dashboard/user/index',[
            'title' => 'Table User',
            'data' => User::with(['title'])->latest()->usersearch(request(['search']))->paginate(10)
        ]);
    }

    public function create()
    {
        return view('dashboard/user/create',[
            'title' => 'Create New User',
            'list' => Title::all()
        ]);
    }

    public function store(Request $request)
    {
        $validation = Validator::make($request->all(),[
            'name' => 'required',
            'title_id' => 'required',
            'email' => ['required','unique:users','email:dns'],
            'role' => 'nullable',
            'password' => ['required','min:5'],
            'password_confirm' => ['required','same:password']
        ],[
            'name.required' => 'Please fill your full name',
            'title_id.required' => 'Please choose one job title',
            'email.required' => 'We need to know your email!',
            'email.unique' => 'This email is already taken, Use another email!',
            'email.email' => 'This is not valid email address',
            'password.required' => 'Are you forget to fill password?',
            'password.min' => 'Your Password is less than 5 character',
            'password_confirm.required' => 'Are you forget to fill password confirm?',
            'password_confirm.same' => 'Your password & password confirm is not same'  
        ]);

        if($validation->fails()){
            return Redirect::back()->withErrors($validation)->withInput();
        }

        $data = [
            'name' => $request->input('name'),
            'title_id' => $request->input('title_id'),
            'email' => $request->input('email'),
            'role' => $request->input('role'),
            'password' => Hash::make($request->input('password'))
        ];

        DB::table('users')->insert($data);
        return redirect('/user')->with('success','Success Create New User!');
    }

    public function edit($id)
    {
        return view('dashboard/user/edit',[
            'title' => 'Edit User',
            'data' => User::findOrFail($id),
            'list' => Title::all()
        ]);
    }

    public function update(Request $request, User $data)
    {
        $rule = [
            'name' => 'required',
            'title_id' => 'required',
        ];

        if($request->email != $data->email){
            $rule['email'] = ['required','unique:users','email:dns'];
        }

        $validate = $request->validate($rule,[
            'name.required' => 'Please fill your full name',
            'title_id.required' => 'Please fill your title job',
            'email.required' => 'Your email is required',
            'email.unique' => 'This email already registered by another user',
            'email.email' => 'This is not valid email address'
        ]);


        User::where('id',$data->id)->update($validate);
        return redirect('/user')->with('success','Update User Success');
        
    }

    public function editPassword($id)
    {
        return view('dashboard/user/password',[
            'title' => 'Update Password',
            'data' => User::findOrFail($id)
        ]);
    }

    public function updatePassword(Request $request, $id)
    {
        $rule = Validator::make($request->all(),[
            'password' => 'required|min:5',
            'password_confirm' => 'required|same:password'
        ]);

        if($rule->fails()){
            return Redirect::back()->withErrors($rule)->withInput();
        }

        $data = [
            'password' => Hash::make($request->input('password'))
        ];

        DB::table('users')->where('id',$id)->update($data);
        return redirect('/user')->with('success','Update Password Success');
    }

    public function destroy($id)
    {
        User::destroy($id);
        return redirect('/user');
    }
}
