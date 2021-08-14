<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\deletephoto;
use Session;
use File; 
use App\Http\Requests;

use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {
        $all_tkb = DB::table('thoikhoabieu')->where('TT','đã duyệt')->orderby('Thu','asc')->orderby('TuTiet','asc')->orderby('DenTiet','asc')->orderby('MaPMT','asc')->get();
        return view('Page.homemain')->with('all_tkb',$all_tkb);

    }
    public function dangky()
    {
        $mamh = DB::table('monhoc')->get();
        $mapmt = DB::table('phongmay')->orderby('MaPMT','asc')->get(); 
        return view('Page.dangky')->with('mamh',$mamh)->with('mapmt',$mapmt);
    }
    public function save_dk(Request $request){
       
        $tinhtrang = 'đợi duyệt';
        $data = array();
        $data['MaMH'] = $request->mamh;
        $data['TenGV'] = $request->tengv;
        $data['Thu'] = $request->thu;
        $data['TuTiet'] = $request->tutiet;
        $data['DenTiet'] = $request->dentiet;
        $data['SoLuongSV'] = $request->sl;
        $data['MaPMT'] = $request->mapmt;
        $data['TT'] = $tinhtrang;
        if($data){
            DB::table('thoikhoabieu')->insert($data);
            Session::put('message','Đăng ký Thành Công');
            return Redirect::to('dangky');
        }
        else{    
            Session::put('message','Đăng Ký Không Thành Công');
            return Redirect::to('dangky'); 
        }
    }
    public function suco()
    {
        $mamt = DB::table('maytinh')->get();
        $mapmt = DB::table('phongmay')->orderby('MaPMT','asc')->get();
        return view('page.suco')->with('mapmt',$mapmt)->with('mamt',$mamt);
    }
    public function save_sc(Request $request){
        
        // $data['BanPhim'] = $request->banphim;
        // $data['Chuot'] = $request->chuot;
        // $data['ManHinh'] = $request->manhinh;
        // $data['ThungMay'] = $request->thungmay;
        // $data['TinhTrang'] = 1;
        // $data['Comment'] = $request->suco;
        // $data['SLH'] = $slh + 1;
        // $data['MaPMT'] = $request->mapmt;
        // if($data){
                   
        //     DB::table('maytinh')->where('MaMT',$request->mamt)->update($data);
        //     Session::put('message','Báo cáo sự cố thành công');
        //     return Redirect::to('suco');
        // }
            
        // DB::table('maytinh')->where('MaMT',$request->mamt)->update($data);
        // Session::put('message','Báo cáo sự cố thành công');
        // return Redirect::to('suco');
        $bcsc =  DB:: update( 'update maytinh set BanPhim = ?,
        Chuot = ?,
        ManHinh = ?,
        ThungMay = ?,
        UngDung = ?,
        TinhTrang = 1,
        Comment = ?,
        SLH = SLH + 1,
        MaPMT = ?  where MaMT = ?' ,[$request->banphim , $request->chuot,$request->manhinh,$request->thungmay,$request->ungdung,$request->suco,$request->mapmt,$request->mamt]);
        if($bcsc){
                   
            Session::put('message','Báo cáo sự cố thành công');
            return Redirect::to('suco');
        }
            
        Session::put('message','Báo cáo sự cố thành công');
        return Redirect::to('suco');

    }
    public function search(Request $request){

        $keywords = $request->search;
        $search_tkb = DB::table('thoikhoabieu')->where([
            ['MaMH','like','%'.$keywords.'%'],
            ['TT','đã duyệt']])->orwhere([['TenGV','like','%'.$keywords.'%'],['TT','đã duyệt']])->orwhere([['Thu','like','%'.$keywords.'%'],['TT','đã duyệt']])->orwhere([['TuTiet','like','%'.$keywords.'%'],['TT','đã duyệt']])->orwhere([['DenTiet','like','%'.$keywords.'%'],['TT','đã duyệt']])->orwhere([['MaPMT','like','%'.$keywords.'%'],['TT','đã duyệt']])->orderby('Thu','asc')->orderby('TuTiet','asc')->orderby('DenTiet','asc')->orderby('MaPMT','asc')->get(); 
        

        return view('page.search')->with('search_tkb',$search_tkb);

    }

}
