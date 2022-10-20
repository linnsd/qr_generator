<?php

namespace App\Http\Controllers;

use App\Models\PcSale;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\QRGenerate;

class FrontendController extends Controller
{
     /**
      * Display a listing of the resource.
      *
      * @return \Illuminate\Http\Response
      */
     public function qr_data($id)
     {
          $data = PcSale::find($id);
          return view('pc_sale.qr_data', compact('data'));
     }

     public function home()
     {
          $total_users = User::count();
          $total_qr = QRGenerate::count();
          $total_pc_sales = PcSale::count();

          return view('home', compact('total_users', 'total_qr', 'total_pc_sales'));
     }

     /**
      * Show the form for creating a new resource.
      *
      * @return \Illuminate\Http\Response
      */
}