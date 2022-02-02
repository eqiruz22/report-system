<?php

namespace App\Exports;

use App\Models\Report;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithTitle;

class ReportExport implements WithHeadings, WithColumnFormatting, FromView, ShouldAutoSize, WithTitle
{
    public function title(): string
    {
        return 'Report';
    }
    public function headings(): array
    {
        return [
            'SALES',
            'PRJ',
            'PROJECT TITLE',
            'PO',
            'COSTUMER',
            'PROJECT TYPE',
            'DATE OF PO',
            'DUE DATE',
            'PROJECT VALUE',
            'REMAINING REIMBUSMENT FEE',
            'GROSS MARGIN',
            'NET MARGIN',
            'IRR',
            'EQUIPMENT',
            'PMO COST',
            'OPEX',
        ];
    }

    public function columnFormats(): array
    {
        return [
            'I' => NumberFormat::FORMAT_NUMBER_00,
            'J' => NumberFormat::FORMAT_NUMBER_00,
            'N' => NumberFormat::FORMAT_NUMBER_00,
            'O' => NumberFormat::FORMAT_NUMBER_00,
            'P' => NumberFormat::FORMAT_NUMBER_00
        ];
    }

    public function view(): View
    {
        return view('dashboard/report-excel',[
            'title' => 'Report Excel',
            'list' => Report::with(['user'])->orderBy('id','desc')->get()
        ]);
    }

}