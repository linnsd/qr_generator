<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Hash;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = new User();

        $count=$users->get()->count();

        $users = $users->orderBy('created_at','desc')->paginate(10);
      
        return view('users.index',compact('count','users'))->with('i', (request()->input('page', 1) - 1) * 10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);
           
        // $data = $request->all();
        // $check = $this->create($data);

         User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
          ]);
         
        return redirect("users")->withSuccess('Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\QrCode  $qrCode
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\QrCode  $qrCode
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\QrCode  $qrCode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required',
        ]);

        $user = User::find($id);
        $user = $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password != null ? Hash::make($request->password):$user->password
        ]);
        return redirect("users")->withSuccess('Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\QrCode  $qrCode
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id)->delete();
        return redirect("users")->withSuccess('Success');
    }
}
