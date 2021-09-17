<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TdsReportExport implements FromView 
{
    public function __construct($tds){
        $this->tds = $tds;
    }
  
    public function view(): View
    {
        return view('pages.dashboard_pages.reports.ExcelTds')->with('tds',$this->tds);
    }
}
