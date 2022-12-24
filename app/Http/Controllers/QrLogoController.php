<?php

namespace App\Http\Controllers;

use App\Models\QrLogo;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class QrLogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $logos = QrLogo::orderBy('created_at', 'desc');

        if ($request->keyword != '') {
            $logos = $logos->where('name', 'LIKE', '%' . $request->keyword . '%');
        }
        $count = $logos->count();
        $logos = $logos->paginate(10);
        return view('qr_logo.index', compact('logos', 'count'))->with('i', (request()->input('page', 1) - 1) * 10);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('qr_logo.create');
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
        $this->validate($request, [
            'name' => 'required|min:3|max:50',
            'logo' => 'required|mimes:png|max:204800',
        ]);

        // normal file upload
        $destinationPath = public_path() . '/uploads/logos/';
        $file_name = "";
        //upload image
        if ($file = $request->file('logo')) {
            $extension = $file->getClientOriginalExtension();
            $safeName =  'logo_' . Carbon::now()->timestamp . '.' . $extension;
            $file->move($destinationPath, $safeName);
            $file_name = $safeName;
        }

        QrLogo::create([
            'name' => $request->name,
            'file_name' => $file_name,
            'status' => 0,
        ]);

        return redirect()->route('logo.index')->with('success', 'Created Success');
    }

    public function status_change(Request $request)
    {
        $id = $request->logo_id;
        $status = $request->status;

        QrLogo::find($id)->update([
            'status' => $status,
        ]);

        $temps = QrLogo::where('id', '!=', $id)->get();
        foreach ($temps as $temp) {
            $temp->update(
                ['status' => 0,]
            );
        }


        return response([
            'message' => "Success",
            'status' => 1
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QrLogo  $qrLogo
     * @return \Illuminate\Http\Response
     */
    public function show(QrLogo $qrLogo)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QrLogo  $qrLogo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = QrLogo::find($id);
        // dd($data);
        return view('qr_logo.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\QrLogo  $qrLogo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //

        $destinationPath = public_path() . '/uploads/logos/';
        $file_name = "";
        //upload image
        if ($file = $request->file('logo')) {
            $extension = $file->getClientOriginalExtension();
            $safeName =  'logo_' . Carbon::now()->timestamp . '.' . $extension;
            $file->move($destinationPath, $safeName);
            $file_name = $safeName;

            unlink(public_path('uploads/logos/' . $request->old_file_name));
        } else {
            $file_name = $request->old_file_name;
        }

        QrLogo::find($id)->update([
            'name' => $request->name,
            'file_name' => $file_name,
        ]);

        return redirect()->route('logo.index')->with('success', 'Successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QrLogo  $qrLogo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $data =  QrLogo::find($id);
        unlink(public_path('uploads/logos/' . $data->file_name));

        $data->delete();
        return redirect()->route('logo.index')->with('success', 'Successfully deleted');
    }
}