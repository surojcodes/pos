<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class IncomeReportExport implements FromView 
{
    public function __construct($details,$report_type){
        $this->details = $details;
        $this->report_type = $report_type;
    }
  
    public function view(): View
    {
        return view('pages.dashboard_pages.reports.ExcelIncome')->with('details',$this->details)->with('report_type',$this->report_type);
    }
}
