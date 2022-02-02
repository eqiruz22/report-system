<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\TermOfPayment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class TermOfPaymentController extends Controller
{
    public function index()
    {
        return view('dashboard/termofpayment/index',[
            'title' => 'Term Of Payment',
            'data' => TermOfPayment::with(['user','report'])->latest()->topsearch(request(['search']))->paginate(10)
        ]);
    }

    public function create()
    {
        return view('dashboard/termofpayment/create',[
            'title' => 'Create Term Of Payment',
            'data' => Report::all(),
        ]);
    }

    public function store(Request $request)
    {
        $rule = Validator::make($request->all(),[
            'user_id' => 'required',
            'report_id' => 'required|unique:term_of_payments',
            'tanggal_invoice' => 'nullable',
            'remarks_finance' => 'nullable'
        ],[
            'report_id.required' => 'PRJ Form cannot be empty, Please choose one',
            'report_id.unique' => 'PRJ is already created by another user'
        ]);

        if($rule->fails()){
            return Redirect::back()->withErrors($rule)->withInput();
        }

        $data = [
            'user_id' => $request->input('user_id'),
            'report_id' => $request->input('report_id'),
            'tanggal_invoice' => $request->input('tanggal_invoice'),
            'remarks_finance' => $request->input('remarks_finance')
        ];
        
        DB::table('term_of_payments')->insert($data);
        return redirect('/term-of-payment')->with('success','Success Create Term Of Payments');
    }

    public function edit($id)
    {
        return view('dashboard/termofpayment/edit',[
            'title' => 'Edit Term Of Payment',
            'data' => TermOfPayment::findOrFail($id),
            'list' => Report::all()
        ]);
    }

    public function update(Request $request, $id)
    {
        $rule = Validator::make($request->all(),[
            'user_id' => 'required',
            'report_id' => 'required',
            'tanggal_invoice' => 'nullable',
            'remarks_finance' => 'nullable'
        ]);

        if($rule->fails()){
            return Redirect::back()->withErrors($rule)->withInput();
        }

        $data = [
            'user_id' => $request->input('user_id'),
            'report_id' => $request->input('report_id'),
            'tanggal_invoice' => $request->input('tanggal_invoice'),
            'remarks_finance' => $request->input('remarks_finance')
        ];

        DB::table('term_of_payments')->where('id',$id)->update($data);
        return redirect('/term-of-payment')->with('success','Update Term Of Payment Success!');
    }

    public function destroy($id)
    {
        TermOfPayment::destroy($id);
        return redirect('/term-of-payment');
    }
}
