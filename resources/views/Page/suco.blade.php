@extends('layout')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <section class="panel">
             <?php
                $message = Session::get('message');
                if($message){
                    echo '<span class="text-alert">'.$message.'</span>';
                    Session::put('message',null);
                }
                ?>
            <div class="panel-body">
                <div class="position-center">
                    <form role="form" action="{{ route('mt.savesc')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mã Máy Tính</label>
                            <select name="mamt" class="form-control input-sm m-bot15">
                                @foreach($mamt as $mt)
                                    <option value="{{$mt->MaMT}}">{{$mt->MaMT}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Phòng Máy Tính</label>
                            <select name="mapmt" class="form-control input-sm m-bot15">
                                @foreach($mapmt as $mapmtc)
                                    <option value="{{$mapmtc->MaPMT}}">{{$mapmtc->TenPMT}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Bàn Phím</label>
                            <select name="banphim" class="form-control input-sm m-bot15">
                                <option value="0">Bình Thường</option>
                                <option value="1">Hỏng</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Chuột</label>
                            <select name="chuot" class="form-control input-sm m-bot15">
                                <option value="0">Bình Thường</option>
                                <option value="1">Hỏng</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Màn Hình</label>
                            <select name="manhinh" class="form-control input-sm m-bot15">
                                <option value="0">Bình Thường</option>
                                <option value="1">Hỏng</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Thùng Máy</label>
                            <select name="thungmay" class="form-control input-sm m-bot15">
                                <option value="0">Bình Thường</option>
                                <option value="1">Hỏng</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Ứng Dụng</label>
                            <select name="ungdung" class="form-control input-sm m-bot15">
                                <option value="0">Bình Thường</option>
                                <option value="1">Hỏng</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Sự Cố</label>
                            <textarea  name="suco"  id="exampleInputEmail1" placeholder="Sự Cố" rows="4"  required="true" style="width: 100%; height:100px" ></textarea>
                        </div>
                        
                        <button type="submit" class="btn btn-info">Báo Cáo</button>
                    </form>
                </div>

            </div>

        </section>

    </div>
</div>
@endsection