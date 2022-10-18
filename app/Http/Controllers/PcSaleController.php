<?php

namespace App\Http\Controllers;

use App\Models\PcSale;
use Illuminate\Http\Request;

class PcSaleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $pc_sales = new PcSale();
        $pc_sales = $pc_sales->leftjoin('users', 'users.id', '=', 'pc_sales.c_by')
            ->select('users.name AS created_name', 'users.branch AS branch', 'pc_sales.*')
            ->orderBy('created_at', 'desc')->paginate(10);
        return view('pc_sale.index', compact('pc_sales'))->with('i', (request()->input('page', 1) - 1) * 10);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('pc_sale.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        PcSale::store_date($request);
        return redirect("pc_sale")->withSuccess('Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\pc_sale  $pc_sale
     * @return \Illuminate\Http\Response
     */
    public function show(PcSale $pc_sale)
    {
        //
        return view('pc_sale.show');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\pc_sale  $pc_sale
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = PcSale::find($id);
        return view('pc_sale.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\pc_sale  $pc_sale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        PcSale::update_data($request, $id);
        return redirect("pc_sale")->withSuccess('Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PcSale  $PcSale
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $pc_sale = PcSale::find($id);
        $pc_sale->delete();
        return redirect("pc_sale")->withSuccess('Success');
    }
}