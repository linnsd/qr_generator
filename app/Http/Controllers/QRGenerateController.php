<?php

namespace App\Http\Controllers;

use App\Models\QRGenerate;
use App\Models\PcSale;
use Illuminate\Http\Request;
use QrCode;
use File;
use App\Exports\QRExport;
use App\Models\Category;
use Maatwebsite\Excel\Facades\Excel;
use URL;

class QRGenerateController extends Controller
{
    function __construct()
    {
        $this->middleware('permission:qr-list|qr-create|qr-edit|qr-delete', ['only' => ['index', 'store']]);
        $this->middleware('permission:qr-create', ['only' => ['create', 'store']]);
        $this->middleware('permission:qr-edit', ['only' => ['edit', 'update']]);
        $this->middleware('permission:qr-delete', ['only' => ['destroy']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $qr_list = new QRGenerate();

        $qr_list = $qr_list->leftjoin('categories', 'q_r_generates.category_id', '=', 'categories.id')
            ->select('q_r_generates.*', 'categories.name AS category_name');

        if (auth()->user()->name == "Admin") {
            $qr_list = $qr_list;
        } else {
            $qr_list = $qr_list->where('c_by', auth()->user()->id);
        }

        if ($request->item_name != null) {
            $qr_list = $qr_list->where('remark', 'like', '%' . $request->item_name . '%')->orWhere('q_r_generates.qr_link','%'.$request->item_name.'%');
        }

        if ($request->category != null) {
            $qr_list = $qr_list->where('category_id', $request->category);
        }

        $count = $qr_list->get()->count();

        $qr_list = $qr_list->orderBy('created_at', 'desc')->paginate(10);
        $categories = Category::where('status', 1)->get();

        return view('qrcode.index', compact('count', 'qr_list', 'categories'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $qr_data = null;
        $categories = Category::where('status', 1)->get();
        return view('qrcode.create', compact('qr_data', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $qr_count = QRGenerate::where('qr_link', $request->qr_link)->get()->count();
        // dd($qr_count);
        if ($qr_count == 0) {
            $photo = 'qrcode' . date("Y-m-d-H-m-s") . '.png';
            $qr_generate = QRGenerate::create([
                'path' => '/uploads/qrcode/',
                'photo' => $photo,
                'qr_link' => $request->qr_link,
                'category_id' => $request->category,
                'remark' => $request->remark,
                'c_by' => auth()->user()->id
            ]);

            // $path = $member->path;

            $destinationPath = public_path() . '/uploads/qrcode/';

            if (!File::isDirectory($destinationPath)) {
                File::makeDirectory($destinationPath, 0777, true, true);
            }

            if (File::exists($destinationPath . 'qrcode.png')) {
                File::delete($destinationPath . 'qrcode.png');
            }

            $qrcode = QrCode::size(170)
                ->format('png')
                ->generate($request->qr_link, public_path('uploads/qrcode/' . $photo));

            // dd($qrcode);

            // return redirect()->route('qr.index') 
            //     ->with('success', 'QrCode generate  success!.');

            $qr_data = QRGenerate::find($qr_generate->id);
        } else {
            $qr_data = QRGenerate::where('qr_link', $request->qr_link)->first();
        }

        $categories = Category::where('status', 1)->get();

        return view('qrcode.create', compact('qr_data', 'categories'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QRGenerate  $qRGenerate
     * @return \Illuminate\Http\Response
     */
    public function show(QRGenerate $qRGenerate)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QRGenerate  $qRGenerate
     * @return \Illuminate\Http\Response
     */
    public function edit(QRGenerate $qRGenerate)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\QRGenerate  $qRGenerate
     * @return \Illuminate\Http\Response
     */
    public function update_remark(Request $request, $id)
    {
        $data = QRGenerate::find($id)->update([
            'remark' => $request->remark,
            'category_id' => $request->category,
        ]);
        return redirect()->route('qr.index')->with('message', 'success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QRGenerate  $qRGenerate
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // dd($id);
        $qr_data = QRGenerate::find($id)->delete();
        return redirect()->route('qr.index')->with('message', 'success');
    }

    public function qr_download(Request $request)
    {
        // dd($request->all());

        $strpath = public_path() . $request->qr_path . $request->qr_photo;
        // dd($strpath);
        $myFile = str_replace("\\", '/', $strpath);
        $headers = ['Content-Type: application/*'];
        $newName = $request->qr_photo . '.png';


        return response()->download($myFile, $newName, $headers);
    }

    public function qr_export()
    {
        return Excel::download(new QRExport, 'qr_list.xlsx');
    }

    public function generate_qr($id)
    {
        $photo = 'qrcode' . date("Y-m-d-H-m-s") . '.png';

        $destinationPath = public_path() . '/uploads/pc_sale/';

        if (!File::isDirectory($destinationPath)) {
            File::makeDirectory($destinationPath, 0777, true, true);
        }

        if (File::exists($destinationPath . 'qrcode.png')) {
            File::delete($destinationPath . 'qrcode.png');
        }

        // dd();
        $qrcode = QrCode::size(500)
            ->format('png')
            ->generate(URL::to("/") . '/qr_data/' . $id, public_path('uploads/pc_sale/' . $photo));

        $strpath = $photo;

        return view('pc_sale.qr_detail', compact('strpath'));

        // $strpath = public_path().'/uploads/pc_sale/'.$photo;
        // // dd($strpath);
        // $myFile = str_replace("\\", '/', $strpath);
        // $headers = ['Content-Type: application/*'];
        // $newName = $photo.'.png';

        // // return redirect()->route('pc_sale.index')->with('success','success');
        // return response()->download($myFile, $newName, $headers);
    }

    public function print_qr($id)
    {
        $data = PcSale::find($id);
        return view('pc_sale.print_data', compact('data'));
    }

    public function download_pc_qr(Request $request)
    {
        $strpath = public_path() . '/uploads/pc_sale/' . $request->photo_path;
        // dd($strpath);
        $myFile = str_replace("\\", '/', $strpath);
        $headers = ['Content-Type: application/*'];
        $newName = $request->photo_path;

        return response()->download($myFile, $newName, $headers);
    }

    public function print_pc_qr(Request $request)
    {
        $photo_path = '/uploads/pc_sale/' . $request->photo_path;

        return view('pc_sale.pc_qr_print', compact('photo_path'));
    }

    public function print_all_qr(Request $request)
    {
        $photo_path = '/uploads/qrcode/' . $request->photo_path;

        return view('pc_sale.pc_qr_print', compact('photo_path'));
    }
}