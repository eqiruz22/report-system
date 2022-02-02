<?php

namespace App\Exports;

use App\Models\TermOfPayment;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;

class TermOfPaymentExport implements FromView, WithTitle
{

    public function title(): string
    {
        return 'Term Of Payment';
    }

    public function view(): View
    {
       return view('dashboard/term',[
           'data' => TermOfPayment::orderBy('id','desc')->get()
       ]);
    }
}