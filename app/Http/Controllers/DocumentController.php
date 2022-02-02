<?php

namespace App\Http\Controllers;

use App\Models\Document;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DocumentController extends Controller
{
    public function index()
    {
        return view('dashboard/doc/index',[
            'title' => 'Document',
            'data' => Document::all()
        ]);
    }

    public function store(Request $request)
    {

            $validate = $request->validate([
                'filedocs' => ['required','mimes:pdf,csv,xlx,xlsx,doc,docx','max:5024'],
                'name' => 'nullable'
            ],[
                'filedocs.required' => 'Document is required',
                'filedocs.mimes' => 'Document must be this valid extensions pdf,csv,xlx,xlsx,doc,docx',
                'filedocs.max' => 'Maximum document upload is 5MB'
            ]);

            if($request->file('filedocs')){
                $filename = $request->file('filedocs')->getClientOriginalName();
                $validate['filedocs'] = $request->file('filedocs')->storeAs('docs-store',$filename); 
            }

            Document::create(str_replace("docs-store/","",$validate));
            return redirect('/document')->with('success','Upload File Success');
    }

    public function edit($id)
    {
        return view('dashboard/doc/edit',[
            'title' => 'Edit Document',
            'data' => Document::findOrFail($id)
        ]);
    }

    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'filedocs' => ['required','mimes:pdf,csv,xlx,xlsx,doc,docx','max:5024'],
            'name' => 'nullable'
        ],[
            'filedocs.required' => 'Document is required',
            'filedocs.mimes' => 'Document must be this valid extensions pdf,csv,xlx,xlsx,doc,docx',
            'filedocs.max' => 'Maximum document upload is 5MB'
        ]);

        if($request->file('filedocs')){
            if($request->oldDocs){
                Storage::delete('docs-store/'.$request->oldDocs);
            }
            $filename = $request->file('filedocs')->getClientOriginalName();
            $validate['filedocs'] = $request->file('filedocs')->storeAs('docs-store',$filename);
        }

        Document::where('id',$id)->update(str_replace("docs-store/","", $validate));
        return redirect('/document')->with('success','Update File Success');
    }

    public function destroy(Document $data)
    {
        if($data->filedocs){
            Storage::delete('docs-store/'.$data->filedocs);
        }
        Document::destroy($data->id);
        return redirect('/document');
    }
}