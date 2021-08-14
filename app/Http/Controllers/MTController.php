<?php

namespace App\Http\Controllers;

use App\deletephoto;
use Illuminate\Http\Request;
use DB;
use Session;
use File; 
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;

class mtController extends Controller
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
    //thêm máy tinh
    public function add_mt()
    {
        $mapmt = DB::table('phongmay')->orderby('MaPMT','asc')->get(); 
        return view('admin.add_mt')->with('mapmt',$mapmt);
    }
    //lưu dữ liệu vào data
    public function save_mt(Request $request){
       
        $data = array();
        $data['MaMT'] = $request->mamt;
        $data['BanPhim'] = 0;
        $data['Chuot'] = 0;
        $data['ManHinh'] = 0;
        $data['ThungMay'] = 0;
        $data['TinhTrang'] = 0;
        $data['Comment'] = 'Không';
        $data['SLH'] = 0;
        $data['MaPMT'] = $request->category_id;
        if($data){
            DB::table('maytinh')->insert($data);
            Session::put('message','Thêm thành công');
            return Redirect::to('all-mt');
        }
        else{    
            Session::put('message','khong thanh cong');
            return Redirect::to('all-mt'); 
        }
    }
    //xử lý máy hỏng
    public function edit_mt($mt_id)
    {
        $mapmt = DB::table('phongmay')->get(); 
        $edit_mt = DB::table('maytinh')->where('MaMT',$mt_id)->get();
        return view('admin.edit_mt')->with('edit_mt',$edit_mt)->with('mapmt',$mapmt);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //xử lý máy hỏng
    public function update_mt(Request $request,$mt_id){
        
        $tt = 0;
        $sc = 'không';
        $data = array();
        
        $data['BanPhim'] = 0;
        $data['Chuot'] = 0;
        $data['ManHinh'] = 0;
        $data['ThungMay'] = 0;
        $data['UngDung'] = 0;
        $data['Comment'] = $sc;
        $data['TinhTrang'] = $tt;
        $data['MaPMT'] = $request->category_id;

        if($data){
                   
            DB::table('maytinh')->where('MaMT',$mt_id)->update($data);
            Session::put('message','Xử lý thành công');
            return Redirect::to('all-mt');
        }
            
        DB::table('maytinh')->where('MaMT',$mt_id)->update($data);
        Session::put('message','Xử lý thành công');
        return Redirect::to('all-mt');
    }
    //chỉnh sửa máy tinh
    public function edit1_mt($mt_id)
    {
        $mapmt = DB::table('phongmay')->get(); 
        $edit1_mt = DB::table('maytinh')->where('MaMT',$mt_id)->get();
        return view('admin.edit1_mt')->with('edit1_mt',$edit1_mt)->with('mapmt',$mapmt);
    }
    //chỉnh sửa máy tính
    public function update1_mt(Request $request,$mt_id){
        
        $data = array();
        
        $data['BanPhim'] = $request->banphim;
        $data['Chuot'] = $request->chuot;
        $data['ManHinh'] = $request->manhinh;
        $data['ThungMay'] = $request->thungmay;
        $data['UngDung'] = $request->ungdung;
        $data['Comment'] = $request->comment;
        $data['TinhTrang'] = $request->tinhtrang;
        $data['MaPMT'] = $request->category_id;

        if($data){
                   
            DB::table('maytinh')->where('MaMT',$mt_id)->update($data);
            Session::put('message','Sửa thành công');
            return Redirect::to('all-mt');
        }
            
        DB::table('maytinh')->where('MaMT',$mt_id)->update($data);
        Session::put('message','Sửa thành công');
        return Redirect::to('all-mt');
    }
    //hiển thị danh sách máy tính
    public function all_mt(){
        
        $all_mt = DB::table('maytinh')->paginate(4);
        return view('admin.all_mt')->with('all_mt',$all_mt);

    }
    //hiển thị danh sách máy hỏng
    public function all_mh(){
        
        $all_mh = DB::table('maytinh')->where('TinhTrang',1)->paginate(4);
        return view('admin.all_mh')->with('all_mh',$all_mh);

    }
    
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //xóa máy tính khỏi data
    public function delete_mt($mt_id){
        DB::table('maytinh')->where('MaMT',$mt_id)->delete();
        Session::put('message','Xóa thành công');
        return Redirect::to('all-mt');
    }

    public function all_tkmth(){
        
        $all_tkmth = DB::table('maytinh')->paginate(4);
        return view('admin.all_tkmth')->with('all_tkmth',$all_tkmth);

    }
}
