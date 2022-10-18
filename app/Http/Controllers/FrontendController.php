<?php

namespace App\Http\Controllers;

use App\Models\PcSale;
use Illuminate\Http\Request;
use App\Models\User;

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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    
}