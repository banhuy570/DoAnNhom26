<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
 use File; 
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function AuthLogin(){
        $user__id = Session::get('user__id');
        if($user__id){
            return Redirect::to('dashboard');
        }else{
            return Redirect::to('admin')->send();
        }
    }

    public function index() {
        
        return view('admin.dashboard');
    }


    public function show_drashboard() {
         $this->AuthLogin();
        return view('admin.dashboard');
    }


     public function dashboard(Request $request){
        $user_email = $request->user_email;
        $user_password = md5($request->user_password);
        $result = DB::table('tbl_user')->where('user_email',$user_email)->where ('user_password',$user_password)->first();
        if($result){
            Session::put('user_name',$result->user_name);
            Session::put('user_id',$result->user_id);
            return view('admin.dashboard');
        }else{
            Session::put('message','Sai Tài Khoản hoặc Mật Khẩu!');
            return Redirect::to('/admin');
        }
        
    }

    public function logout(){
        Session::put('user_name',null);
            Session::put('user_id',null);
            return Redirect::to('/admin');
        
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
