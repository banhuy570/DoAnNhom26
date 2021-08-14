@extends('admin_layout')
@section('admin_content')
<div class="row">
<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading">
           Chỉnh sửa Thời Khóa Biểu
        </header>
         <?php
            $message = Session::get('message');
            if($message){
                echo '<span class="text-alert">'.$message.'</span>';
                Session::put('message',null);
            }
            ?>
        <div class="panel-body">

            <div class="position-center">
                @foreach($edit1_tkb as $key => $cate)
                <form role="form" action="{{ route('tkb.update1',$cate->MaTKB)}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                <div class="form-group">
                    <label for="exampleInputEmail1">Môn Học</label>
                    <select name="monhoc" class="form-control input-sm m-bot15" >
                            @foreach($mamh as  $mh)
                                @if($mh->MaMH==$cate->MaMH)
                                <option selected value="{{$mh->MaMH}}">{{$mh->TenMH}}</option>
                                @else
                                <option value="{{$mh->MaMH}}">{{$mh->TenMH}}</option>
                                @endif
                            @endforeach
                                
                        </select>
                    
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên GV</label>
                    <input type="text" name="tengv" class="form-control" id="exampleInputEmail1" value="{{$cate->TenGV}}" required="true" >
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Thứ</label>
                    <input type="text" name="thu" class="form-control" id="exampleInputEmail1" value="{{$cate->Thu}}" required="true" >
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Từ Tiết</label>
                    <input type="text" name="tutiet" class="form-control" id="exampleInputEmail1" value="{{$cate->TuTiet}}" required="true" >
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Đến Tiết</label>
                    <input type="text" name="dentiet" class="form-control" id="exampleInputEmail1" value="{{$cate->DenTiet}}" required="true" >
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">SL</label>
                    <input type="text" name="sl" class="form-control" id="exampleInputEmail1" value="{{$cate->SoLuongSV}}" required="true" >
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">PMT</label>
                    <select name="category_id" class="form-control input-sm m-bot15" >
                        @foreach($mapmt as  $mapmtc)
                                @if($mapmtc->MaPMT==$cate->MaPMT)
                                <option selected value="{{$mapmtc->MaPMT}}">{{$mapmtc->TenPMT}}</option>
                                @else
                                <option value="{{$mapmtc->MaPMT}}">{{$mapmtc->TenPMT}}</option>
                                @endif
                            @endforeach
                    </select>
                </div>
                     
                <button type="submit" name="add_tkb" class="btn btn-info">Sửa</button>
                </form>
                @endforeach
            </div>

        </div>
    </section>

</div>
@endsection