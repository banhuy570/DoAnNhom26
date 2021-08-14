<?php

namespace App\Http\Controllers;

use App\deletephoto;
use Illuminate\Http\Request;
use DB;
use Session;
 use File; 
use App\Http\Requests;

use Illuminate\Support\Facades\Redirect;

class TkbController extends Controller
{

    // public function AuthLogin(){
    //     $user_id = Session::get('user_id');
    //     if($user_id){
    //         return Redirect::to('dashboard');
    //     }else{
    //         return Redirect::to('admin')->send();
    //     }
    // }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }
    //thêm thời khóa biểu
    public function add_tkb()
    {
        $mamh = DB::table('monhoc')->get();
        $mapmt = DB::table('phongmay')->get(); 
        return view('admin.add_tkb')->with('mapmt',$mapmt)->with('mamh',$mamh);
    }
    //lưu thời khóa biểu vào data
    public function save_tkb(Request $request){
       
        $tinhtrang = 'đã duyệt';
        $data = array();
        $data['MaMH'] = $request->monhoc;
        $data['TenGV'] = $request->tengv;
        $data['Thu'] = $request->thu;
        $data['TuTiet'] = $request->tutiet;
        $data['DenTiet'] = $request->dentiet;
        $data['SoLuongSV'] = $request->sl;
        $data['MaPMT'] = $request->category_id;
        $data['TT'] = $tinhtrang;
        if($data){
            DB::table('thoikhoabieu')->insert($data);
            Session::put('message','Thêm TKB Thành Công');
            return Redirect::to('all-tkb');
        }
        else{    
            Session::put('message','Thêm TKB Không Thành Công');
            return Redirect::to('all-tkb'); 
        }
    }
    //duyệt đăng ký mượn phòng
    public function edit_tkb($tkb_id)
    {
        $edit_tkb = DB::table('thoikhoabieu')->where('MaTKB',$tkb_id)->get();
        $mamh = DB::table('monhoc')->orderby('MaMH','asc')->get(); 
        $mapmt = DB::table('phongmay')->orderby('MaPMT','asc')->get(); 
        return view('admin.edit_tkb')->with('edit_tkb',$edit_tkb)->with('mamh',$mamh)->with('mapmt',$mapmt);
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //duyệt đăng ký mượn phòng
    public function update_tkb(Request $request,$tkb_id){
       
        $tinhtrang = 'đã duyệt';
        $data = array();
        $data['MaMH'] = $request->monhoc;
        $data['TenGV'] = $request->tengv;
        $data['Thu'] = $request->thu;
        $data['TuTiet'] = $request->tutiet;
        $data['DenTiet'] = $request->dentiet;
        $data['SoLuongSV'] = $request->sl;
        $data['MaPMT'] = $request->category_id;
        $data['TT'] = $tinhtrang;

        if($data){
                   
            DB::table('thoikhoabieu')->where('MaTKB',$tkb_id)->update($data);
            Session::put('message','Đã duyệt thành công');
            return Redirect::to('all-tkb');
        }
            
        DB::table('thoikhoabieu')->where('MaTKB',$tkb_id)->update($data);
        Session::put('message','Duyệt không thành công');
        return Redirect::to('all-tkb');
    }
    //chỉnh sửa thời khóa biểu
    public function edit1_tkb($tkb_id)
    {
        $edit1_tkb = DB::table('thoikhoabieu')->where('MaTKB',$tkb_id)->get();
        $mamh = DB::table('monhoc')->orderby('MaMH','asc')->get(); 
        $mapmt = DB::table('phongmay')->orderby('MaPMT','asc')->get(); 
        return view('admin.edit1_tkb')->with('edit1_tkb',$edit1_tkb)->with('mamh',$mamh)->with('mapmt',$mapmt);
    }
    //chỉnh sửa thời khóa biểu
    public function update1_tkb(Request $request,$tkb_id){
       
        $data = array();
        $data['MaMH'] = $request->monhoc;
        $data['TenGV'] = $request->tengv;
        $data['Thu'] = $request->thu;
        $data['TuTiet'] = $request->tutiet;
        $data['DenTiet'] = $request->dentiet;
        $data['SoLuongSV'] = $request->sl;
        $data['MaPMT'] = $request->category_id;
        $data['TT'] = 'đã duyệt';

        if($data){
                   
            DB::table('thoikhoabieu')->where('MaTKB',$tkb_id)->update($data);
            Session::put('message','Đã Sửa thành công');
            return Redirect::to('all-tkb');
        }
            
        DB::table('thoikhoabieu')->where('MaTKB',$tkb_id)->update($data);
        Session::put('message','Sửa không thành công');
        return Redirect::to('all-tkb');
    }
    public function all_tkb(){
        
        $all_tkb = DB::table('thoikhoabieu')->where('TT','đã duyệt')->paginate(4);
        return view('admin.all_tkb')->with('all_tkb',$all_tkb);

    }
    public function all_dsdk(){
        
        $all_dsdk = DB::table('thoikhoabieu')->where('TT','đợi duyệt')->paginate(4);
        return view('admin.all_dsdk')->with('all_dsdk',$all_dsdk);

    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //xóa TKB
    public function delete_tkb($tkb_id){
     
        DB::table('thoikhoabieu')->where('MaTKB',$tkb_id)->delete();
        Session::put('message','Xóa thành công');
        return Redirect::to('all-tkb');
    }
    //Xóa lịch đăng ký
    public function delete1_tkb($tkb_id){
     
        DB::table('thoikhoabieu')->where('MaTKB',$tkb_id)->delete();
        Session::put('message','Xóa thành công');
        return Redirect::to('all-dsdk');
    }
    //đăng ký mượn phòng
    public function save_dk(Request $request){
       
        $data = array();
        $data['MaMH'] = $request->monhoc;
        $data['TenGV'] = $request->tengv;
        $data['Thu'] = $request->thu;
        $data['TuTiet'] = $request->tutiet;
        $data['DenTiet'] = $request->dentiet;
        $data['SoLuongSV'] = $request->sl;
        $data['MaPMT'] = $request->category_id;
        $data['TT'] = 'đợi duyệt';
        if($data){
            DB::table('thoikhoabieu')->insert($data);
            Session::put('message','Đăng ký thành công');
            return Redirect::to('dangky');
        }
        else{    
            Session::put('message','Đăng ký không thành công');
            return Redirect::to('dangky'); 
        }
    }

}
