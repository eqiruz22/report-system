<?php

namespace App\Exports;

use App\Models\ProgresProject;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;


class ProgresProjectExport implements FromView, WithTitle
{

    public function title(): string
    {
        return 'Progres Project';
    }

    public function view(): View
    {
        return view('dashboard/progres',[
            'data' => ProgresProject::orderBy('id','desc')->get()
        ]);
    }
}