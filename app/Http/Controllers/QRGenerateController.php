<?php

namespace App\Http\Controllers;

use App\Models\QRGenerate;
use Illuminate\Http\Request;
use QrCode;
use File;
class QRGenerateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $qr_list = new QRGenerate();

        $count=$qr_list->get()->count();

        $qr_list = $qr_list->orderBy('created_at','desc')->paginate(10);
      
        return view('qrcode.index',compact('count','qr_list'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('qrcode.create');
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
        $photo = 'qrcode'.date("Y-m-d-H-m-s").'.png';
        $attendance_qr = QRGenerate::create([
            'path'=>'/uploads/qrcode/',
            'photo'=>$photo
        ]);

        // $path = $member->path;

        $destinationPath = public_path() . '/uploads/qrcode/';

        if (!File::isDirectory($destinationPath)) {
            File::makeDirectory($destinationPath, 0777, true, true);
        }

        if (File::exists($destinationPath . 'qrcode.png')) {
            File::delete($destinationPath . 'qrcode.png');
        }


        // $qrcode = QrCode::backgroundColor(255, 255, 255)->color(0,0,0)
        //     ->format('png')->size(300)
        //     ->generate($request->qr_link);

        $qrcode = QrCode::size(300)
            ->format('png')
            ->generate($request->qr_link, public_path('uploads/qrcode/'.$photo));

        // dd($qrcode);

        return redirect()->route('qr.index') 
            ->with('success', 'QrCode generate  success!.');
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
    public function update(Request $request, QRGenerate $qRGenerate)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QRGenerate  $qRGenerate
     * @return \Illuminate\Http\Response
     */
    public function destroy(QRGenerate $qRGenerate)
    {
        //
    }

    public function qr_download(Request $request)
    {
        // dd($request->all());

        $strpath = public_path().$request->qr_path.$request->qr_photo;
        // dd($strpath);
        $myFile = str_replace("\\", '/', $strpath);
        $headers = ['Content-Type: application/*'];
        $newName = $request->qr_photo.'.png';


        return response()->download($myFile, $newName, $headers);
    }
}
