<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class PcSale extends Model
{
    use HasFactory;

    protected $fillable = ['c_name', 'c_phone', 'date', 'cpu', 'board', 'memory', 'hdd', 'graphic', 'power_supply', 'drive', 'casing', 'monitor', 'ups', 'keyboard_mouse', 'antivirus', 'other', 'c_by', 'u_by', 'branch'];

    public static function list($request)
    {
        $pc_sales = new PcSale();
        $pc_sales = $pc_sales->orderBy('created_at', 'desc');

        if ($request->keyword != "") {
            $pc_sales = $pc_sales->where('c_name', 'like', '%' . $request->keyword . '%')
                ->orWhere('c_phone', 'like', '%' . $request->keyword . '%')
                ->orWhere('c_by', 'like', '%' . $request->keyword . '%')
                ->orWhere('u_by', 'like', '%' . $request->keyword . '%');
        }



        if ($request->from_date != "" and $request->to_date != "") {
            $from = date('Y-m-d', strtotime($request->from_date));
            $to = date('Y-m-d', strtotime($request->to_date));

            $pc_sales = $pc_sales->whereBetween('date', [$from, $to]);
        }

        return $pc_sales;
    }

    public static function store_date($request)
    {
        if (Auth::user()->branch == "1") {
            $branch = "HO";
        } else  if (Auth::user()->branch == "2") {
            $branch = "Linn 1";
        } else  if (Auth::user()->branch == "3") {
            $branch = "Linn 2";
        } else  if (Auth::user()->branch == "4") {
            $branch = "Linn 3";
        } else  if (Auth::user()->branch == "5") {
            $branch = "Gadget Store";
        } else {
            $branch = "";
        }

        $pc_sale = new PcSale();
        $pc_sale->c_name = $request->c_name;
        $pc_sale->c_phone = $request->c_phone;
        $pc_sale->date = date('Y-m-d', strtotime($request->date));
        $pc_sale->cpu = $request->cpu;
        $pc_sale->board = $request->board;
        $pc_sale->memory = $request->memory;
        $pc_sale->hdd = $request->hdd;
        $pc_sale->graphic = $request->graphic;
        $pc_sale->power_supply = $request->power_supply;
        $pc_sale->drive = $request->drive;
        $pc_sale->casing = $request->casing;
        $pc_sale->monitor = $request->monitor;
        $pc_sale->ups = $request->ups;
        $pc_sale->keyboard_mouse = $request->keyboard_mouse;
        $pc_sale->antivirus = $request->antivirus;
        $pc_sale->other = $request->other;
        $pc_sale->c_by = Auth::user()->name;
        $pc_sale->branch = $branch;
        $pc_sale->save();
    }

    public static function update_data($request, $id)
    {

        if (Auth::user()->branch == "1") {
            $branch = "HO";
        } else  if (Auth::user()->branch == "2") {
            $branch = "Linn 1";
        } else  if (Auth::user()->branch == "3") {
            $branch = "Linn 2";
        } else  if (Auth::user()->branch == "4") {
            $branch = "Linn 3";
        } else  if (Auth::user()->branch == "5") {
            $branch = "Gadget Store";
        } else {
            $branch = "";
        }

        $pc_sale = PcSale::find($id);
        $pc_sale->c_name = $request->c_name;
        $pc_sale->c_phone = $request->c_phone;
        $pc_sale->date = date('Y-m-d', strtotime($request->date));
        $pc_sale->cpu = $request->cpu;
        $pc_sale->board = $request->board;
        $pc_sale->memory = $request->memory;
        $pc_sale->hdd = $request->hdd;
        $pc_sale->graphic = $request->graphic;
        $pc_sale->power_supply = $request->power_supply;
        $pc_sale->drive = $request->drive;
        $pc_sale->casing = $request->casing;
        $pc_sale->monitor = $request->monitor;
        $pc_sale->ups = $request->ups;
        $pc_sale->keyboard_mouse = $request->keyboard_mouse;
        $pc_sale->antivirus = $request->antivirus;
        $pc_sale->other = $request->other;
        $pc_sale->u_by = Auth::user()->name;
        $pc_sale->branch = $branch;
        $pc_sale->save();
    }
}