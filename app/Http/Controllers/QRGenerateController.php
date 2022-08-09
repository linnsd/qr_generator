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

        $qr_list = $qr_list->orderBy('created_at','desc')->paginate(5);
      
        return view('qrcode.index',compact('count','qr_list'))->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $qr_data = null;
        return view('qrcode.create',compact('qr_data'));
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
        $qr_count = QRGenerate::where('qr_link',$request->qr_link)->get()->count();
        // dd($qr_count);
        if ($qr_count == 0) {
            $photo = 'qrcode'.date("Y-m-d-H-m-s").'.png';
            $qr_generate = QRGenerate::create([
                'path'=>'/uploads/qrcode/',
                'photo'=>$photo,
                'qr_link'=>$request->qr_link
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
                ->generate($request->qr_link, public_path('uploads/qrcode/'.$photo));

            // dd($qrcode);

            // return redirect()->route('qr.index') 
            //     ->with('success', 'QrCode generate  success!.');

            $qr_data = QRGenerate::find($qr_generate->id);
        }else{
            $qr_data = QRGenerate::where('qr_link',$request->qr_link)->first();
        }
        

        return view('qrcode.create',compact('qr_data'));
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
    public function destroy($id)
    {
        // dd($id);
        $qr_data = QRGenerate::find($id)->delete();
        return redirect()->route('qr.index')->with('message','success');

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
