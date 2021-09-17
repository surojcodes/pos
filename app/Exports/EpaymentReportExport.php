<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class EpaymentReportExport implements FromView 
{
    public function __construct($details){
        $this->details = $details;
    }
  
    public function view(): View
    {
        return view('pages.dashboard_pages.reports.ExcelEpayment')->with('details',$this->details);
    }
}
