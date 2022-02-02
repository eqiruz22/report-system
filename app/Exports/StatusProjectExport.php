<?php

namespace App\Exports;

use App\Models\StatusProject;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;

class StatusProjectExport implements FromView, WithTitle
{

    public function title(): string
    {
        return 'Status Project';
    }

    public function view(): View
    {
        return view('dashboard/status',[
            'data' => StatusProject::orderBy('id','desc')->get()
        ]);
    }
}