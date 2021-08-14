<?php

namespace App\Http\Controllers;

use App\deletephoto;
use Illuminate\Http\Request;
use DB;
use Session;
use File; 
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class PMTController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function add_pmt()
    {
        return view('admin.add_pmt');
    }

    public function save_pmt(Request $request){
       
        
        $data = array();
        $data['MaPMT'] = $request->mapmt;
        $data['TenPMT'] = $request->tenpmt;
        $data['SLMay'] = $request->sl;
        if($data){
            DB::table('phongmay')->insert($data);
            Session::put('message','Thêm thành công');
            return Redirect::to('add-pmt');
        }
        else{    
            Session::put('message','Không Thành Công');
            return Redirect::to('all-pmt'); 
        }
      
        
    }
    public function edit_pmt($pmt_id)
    {
        $edit_pmt = DB::table('phongmay')->where('MaPMT',$pmt_id)->get();
        return view('admin.edit_pmt')->with('edit_pmt',$edit_pmt);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_pmt(Request $request,$pmt_id){
        
        $data = array();
       
        $data['MaPMT'] = $request->mapmt;
        $data['TenPMT'] = $request->tenpmt;
        $data['SLMay'] = $request->sl;

        if($data){
                   
            DB::table('phongmay')->where('MaPMT',$pmt_id)->update($data);
            Session::put('message','Cập nhật thành công');
            return Redirect::to('all-pmt');
        }
            
        DB::table('phongmay')->where('MaPMT',$pmt_id)->update($data);
        Session::put('message','Cập nhật thành công');
        return Redirect::to('all-pmt');
    }

    public function all_pmt(){
        
        $all_pmt = DB::table('phongmay')->orderby('MaPMT','desc')->paginate(4);
        return view('admin.all_pmt')->with('all_pmt',$all_pmt);

    }
    
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete_pmt($pmt_id){
        DB::table('phongmay')->where('MaPMT',$pmt_id)->delete();
        Session::put('message','Xóa thành công');
        return Redirect::to('all-pmt');
    }
}
