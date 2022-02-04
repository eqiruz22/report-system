<?php

namespace App\Http\Controllers;

use App\Models\Report;
use App\Models\User;
use App\Notifications\ReportNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class DashboardController extends Controller
{
    
    public function index()
    {
        return view('dashboard/index', [
            'title' => 'index',
            'data' => Report::all()->count(),
            'list' => Report::with(['user'])->latest()->reportsearch(request(['search']))->orderBy('id','desc')->paginate(10),
            'user' => User::all() 
        ]);
    }

    public function tableview()
    {
        return view('dashboard/report/index', [
            'title' => 'report view',
            'data' => Report::with(['user'])->latest()->reportsearch(request(['search']))->orderBy('id','desc')->paginate(10), 
        ]);
    }


    public function create()
    {
        return view('dashboard/report/create', [
            'title' => 'create data report',
            'data' => Report::all(),
            'user' => User::all(),
        ]);
    }

    public function store(Request $request)
    {
       $rule = Validator::make($request->all(), [
        'user_id' => 'required',
        'prj' => 'required|unique:reports',
        'file_ho' => ['mimes:pdf,csv,xls,xlsx,doc,docx','max:5024'],
        'project_title' => 'required',
        'quantity' => 'required',
        'po_number' => 'required|unique:reports',
        'costumer' => 'required',
        'project_type' => 'required',
        'date_of_po' => 'required',
        'due_date' => 'required',
        'project_value' => 'required',
        'remaining_reimbusment_fee' => 'required',
        'gross_margin' => 'required',
        'net_margin' => 'required',
        'irr' => 'required',
        'equipment' => 'required',
        'pmo_cost' => 'required',
        'opex' => 'required'
       ],[
        'prj.required' => 'PRJ Form cannot be empty!',
        'prj.unique' => 'PRJ is already created by another user, please create another prj',
        'file_ho.mimes' => 'Document HO must be this valid extensions pdf,csv,xlx,xlsx,doc,docx',
        'file_ho.max' => 'Maximum document upload is 5MB',
        'project_title.required' => 'Project Title cannot be empty!',
        'quantity.required' => 'Quantity cannot be empty!',
        'po_number.required' => 'PO Number cannot be empty!',
        'po_number.unique' => 'PO Number is already created by another user, please create another po number',
        'costumer.required' => 'Costumer cannot be empty!',
        'project_type.required' => 'Project Type cannot be empty!',
        'date_of_po.required' => 'Date Of Po cannot be empty!',
        'project_value.required' => 'Project Value cannot be empty!',
        'remaining_reimbusment_fee.required' => 'Reimbusment cannot be empty!',
        'gross_margin.required' => 'Gross Margin cannot be empty!',
        'net_margin.required' => 'Net Margin cannot be empty!',
        'irr.required' => 'IRR cannot be empty!',
        'equipment.required' => 'Equipment cannot be empty!',
        'pmo_cost.required' => 'PMO Cost cannot be empty!',
        'opex.required' => 'Opex cannot be empty!',
    ]);

       if($rule->fails()){
            return Redirect::back()->withErrors($rule)->withInput();
       }

       if($request->file('file_ho')){
        $filename = $request->file('file_ho')->getClientOriginalName();
        $validate['file_ho'] = $request->file('file_ho')->storeAs('docs-store-ho',$filename); 
       }
       
       $data = [
           'user_id' => $request->input('user_id'),
           'prj' => $request->input('prj'),
           'file_ho' => $request->file('file_ho')->getClientOriginalName(),
           'project_title' => $request->input('project_title'),
           'quantity' => $request->input('quantity'),
           'po_number' => $request->input('po_number'),
           'costumer' => $request->input('costumer'),
           'project_type' => $request->input('project_type'),
           'date_of_po' => $request->input('date_of_po'),
           'due_date' => $request->input('due_date'),
           'project_value' => deleteDots($request->input('project_value')),
           'remaining_reimbusment_fee' => deleteDots($request->input('remaining_reimbusment_fee')),
           'gross_margin' =>$request->input('gross_margin'),
           'net_margin' =>$request->input('net_margin'),
           'irr' => $request->input('irr'),
           'equipment' => deleteDots($request->input('equipment')),
           'pmo_cost' => deleteDots($request->input('pmo_cost')),
           'opex' => deleteDots($request->input('opex'))
        ];
        

       DB::table('reports')->insert($data);
       return redirect('/table')->with('success','Success Create Report');
    }

    public function show(Report $data)
    {
        return view('dashboard/table',[
            'titleModal' => 'Detail Reports',
            'data' => $data,
        ]);
    }

    public function edit(Report $data)
    {
        return view('dashboard/report/edit',[
            'data' => $data,
            'title' => 'Edit Data Reports',
            'user' => User::all(),
        ]);
    }

    public function update(Request $request, Report $data)
    {
        $rule = [
        'user_id' => 'required',
        'file_ho' => ['nullable','mimes:pdf,csv,xls,xlsx,doc,docx','max:5024'],
        'project_title' => 'required',
        'quantity' => 'required',
        'costumer' => 'required',
        'project_type' => 'required',
        'date_of_po' => 'required',
        'due_date' => 'required',
        'project_value' => 'required',
        'remaining_reimbusment_fee' => 'required',
        'gross_margin' => 'required',
        'net_margin' => 'required',
        'irr' => 'required',
        'equipment' => 'required',
        'pmo_cost' => 'required',
        'opex' => 'required'
        ];

        if($request->prj != $data->prj){
            $rule = [
                'prj' => 'required|unique:reports'
            ];
        }
        if($request->po_number != $data->po_number){
            $rule = [
                'po_number' => 'required|unique:reports'
            ];
        }

        $validate = $request->validate($rule,[
            'file_ho.mimes' => 'Document HO must be this valid extension pdf,csv,xls,xlsx,doc,docx',
            'file_ho.max' => 'Document HO maximum upload is 5MB',
            'prj.required' => 'PRJ is required',
            'prj.unique' => 'this PRJ already created by another user',
            'po_number.required' => 'PO Number is required',
            'po_number.unique' => 'PO Number already created by another user',
            'project_title.required' => 'Project Title is required',
            'quantity.required' => 'Quantity is required',
            'costumer.required' => 'Costumer name is required',
            'project_type.required' => 'Project Type is required',
            'date_of_po.required' => 'Date Of PO is required',
            'due_date.required' => 'Due Date is required',
            'project_value.required' => 'Project Value is required',
            'remaining_reimbusment_fee.required' => 'Reimbusment Fee is required',
            'gross_margin.required' => 'Gross Margin is required',
            'net_margin.required' => 'Net Margin is required',
            'irr.required' => 'IRR is required',
            'equipment.required' => 'Equipment is required',
            'pmo_cost.required' => 'PMO Cost is required',
            'opex.required' => 'Opex is required'
        ]);
        if($request->file('file_ho')){
            if($request->oldHo){
                Storage::delete('docs-store-ho/'.$request->oldHo);
            }
            $filename = $request->file('file_ho')->getClientOriginalName();
            $validate['file_ho'] = $request->file('file_ho')->storeAs('docs-store-ho',$filename);
        }
        $result = str_replace([".","docs-store-ho/"], "", $validate);
        Report::where('id',$data->id)->update($result);
        return redirect('/table')->with('success','Update Data success');
    }

    public function destroy(Report $data)
    {
        if($data->file_ho){
            Storage::delete('docs-store-ho/'.$data->file_ho);
        }
        Report::destroy($data->id);
        return redirect('/table');
    }

    public function reminderPrj()
    {
       $user = User::first();

       $data = [
            'greeting' => 'Hello, '.$user->name,'!',
            'body' => 'This email is to remind you that you have finish your PRJ before due date',
            'regards' => 'Thank you, have a nice day!',
            'actionText' => 'View PRJ',
            'actionUrl' => url('/table')
       ];

       Notification::send($user, new ReportNotification($data));
       return redirect('/table')->with('success','Reminder Send');
    }

}