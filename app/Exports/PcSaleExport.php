<?php

namespace App\Exports;

use App\Models\QRGenerate;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use App\Models\PcSale;
// for applying style sheet
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use \Maatwebsite\Excel\Sheet;

use DB;

class PcSaleExport implements FromView, ShouldAutoSize
{
  /**
   * @return \Illuminate\Support\Collection
   */

  public function view(): View
  {
    $keyword = (!empty($_POST['keyword'])) ? $_POST['keyword'] : '';
    $from_date = (!empty($_POST['from_date'])) ? $_POST['from_date'] : '';
    $to_date = (!empty($_POST['to_date'])) ? $_POST['to_date'] : '';

    $pc_sales = new PcSale();
    $pc_sales = $pc_sales->orderBy('created_at', 'desc');

    if ($keyword != "") {
      $pc_sales = $pc_sales->where('c_name', 'like', '%' . $keyword . '%')
        ->orWhere('c_phone', 'like', '%' . $keyword . '%')
        ->orWhere('c_by', 'like', '%' . $keyword . '%')
        ->orWhere('u_by', 'like', '%' . $keyword . '%');
    }



    if ($from_date != "" and $to_date != "") {
      $from = date('Y-m-d', strtotime($from_date));
      $to = date('Y-m-d', strtotime($to_date));

      $pc_sales = $pc_sales->whereBetween('date', [$from, $to]);
    }

    $pc_sales = $pc_sales->get();

    return view('pc_sale.export', compact('pc_sales'));
  }
}