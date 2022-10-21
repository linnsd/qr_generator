<?php

namespace App\Exports;

use App\Models\QRGenerate;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
// for applying style sheet
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\AfterSheet;
use \Maatwebsite\Excel\Sheet;

use DB;

class QRExport implements FromView, ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */

    public function view(): View
    {
        $item_name = (!empty($_POST['item_name'])) ? $_POST['item_name'] : '';
        $category = (!empty($_POST['category'])) ? $_POST['category'] : '';

        $qr_list = new QRGenerate();
        $qr_list = $qr_list->leftjoin('categories', 'q_r_generates.category_id', '=', 'categories.id')
            ->select('q_r_generates.*', 'categories.name AS category_name');


        if (auth()->user()->name == "Admin") {
            $qr_list = $qr_list;
        } else {
            $qr_list = $qr_list->where('c_by', auth()->user()->id);
        }



        if ($category != null) {
            $qr_list = $qr_list->where('category_id', $category);
        }

        if ($item_name != null) {
            $qr_list = $qr_list->where('remark', 'like', '%' . $item_name . '%');
        }

        // dd($qr_list->get());

        $qr_list = $qr_list->get();
        return view('qrcode.export', compact('qr_list'));
    }
}