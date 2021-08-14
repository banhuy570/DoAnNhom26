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
                    <form role="form" action="{{ route('tkb.savedk')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mã Môn Học</label>
                            <select name="mamh" class="form-control input-sm m-bot15">
                                @foreach($mamh as $mh)
                                    <option value="{{$mh->MaMH}}">{{$mh->TenMH}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên GV</label>
                            <input type="text" name="tengv" class="form-control" id="exampleInputEmail1" placeholder="Tên GV"  required="true" style="width: 100%">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Thứ</label>
                            <select name="thu" class="form-control input-sm m-bot15" >
                                <option selected value="2">2</option> 
                                <option  value="3">3</option> 
                                <option  value="4">4</option> 
                                <option  value="5">5</option> 
                                <option  value="6">6</option> 
                                <option  value="7">7</option> 
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Từ Tiết</label>
                            <select name="tutiet" class="form-control input-sm m-bot15" >
                                <option selected value="1">1</option> 
                                <option  value="2">2</option> 
                                <option  value="3">3</option> 
                                <option  value="4">4</option> 
                                <option  value="5">5</option> 
                                <option  value="6">6</option>
                                <option  value="7">7</option> 
                                <option  value="8">8</option> 
                                <option  value="9">9</option> 
                                <option  value="10">10</option> 
                                <option  value="11">11</option> 
                                <option  value="12">12</option>  
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Đến Tiết</label>
                            <select name="dentiet" class="form-control input-sm m-bot15" >
                                <option  value="1">1</option> 
                                <option selected value="2">2</option> 
                                <option  value="3">3</option> 
                                <option  value="4">4</option> 
                                <option  value="5">5</option> 
                                <option  value="6">6</option>
                                <option  value="7">7</option> 
                                <option  value="8">8</option> 
                                <option  value="9">9</option> 
                                <option  value="10">10</option> 
                                <option  value="11">11</option> 
                                <option  value="12">12</option>  
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Tên GV</label>
                            <input type="text" name="sl" class="form-control" id="exampleInputEmail1" placeholder="Số Lượng SV"  required="true" style="width: 100%">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Phòng Máy Tính</label>
                            <select name="mapmt" class="form-control input-sm m-bot15">
                                @foreach($mapmt as $mapmtc)
                                    <option value="{{$mapmtc->MaPMT}}">{{$mapmtc->TenPMT}}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-info">Đăng Ký</button>
                    </form>
                </div>

            </div>

        </section>

    </div>
</div>
@endsection