@extends('admin_layout')
@section('admin_content')
<div class="row">
<div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
               Chỉnh Sửa Máy Tính
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
                    @foreach($edit1_mt as $key => $mt)
                    <form role="form" action="{{ route('mt.update1', $mt->MaMT)}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Bàn Phím</label>
                        <select name="banphim" class="form-control input-sm m-bot15" >
                            @if($mt->BanPhim==0)
                                <option selected value="0">Bình Thường</option>
                                <option value="1">Hỏng</option>
                            @else
                                <option  value="0">Bình Thường</option>
                                <option selected value="1">Hỏng</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Chuột</label>
                        <select name="chuot" class="form-control input-sm m-bot15" >
                            @if($mt->Chuot==0)
                                <option selected value="0">Bình Thường</option>
                                <option value="1">Hỏng</option>
                            @else
                                <option  value="0">Bình Thường</option>
                                <option selected value="1">Hỏng</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Màn Hình</label>
                        <select name="manhinh" class="form-control input-sm m-bot15" >
                            @if($mt->ManHinh==0)
                                <option selected value="0">Bình Thường</option>
                                <option value="1">Hỏng</option>
                            @else
                                <option  value="0">Bình Thường</option>
                                <option selected value="1">Hỏng</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Thùng Máy</label>
                        <select name="thungmay" class="form-control input-sm m-bot15" >
                            @if($mt->ThungMay==0)
                                <option selected value="0">Bình Thường</option>
                                <option value="1">Hỏng</option>
                            @else
                                <option  value="0">Bình Thường</option>
                                <option selected value="1">Hỏng</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ứng Dụng</label>
                        <select name="ungdung" class="form-control input-sm m-bot15" >
                            @if($mt->UngDung==0)
                                <option selected value="0">Bình Thường</option>
                                <option value="1">Hỏng</option>
                            @else
                                <option  value="0">Bình Thường</option>
                                <option selected value="1">Hỏng</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tình Trạng</label>
                        <select name="tinhtrang" class="form-control input-sm m-bot15" >
                            @if($mt->TinhTrang==0)
                                <option selected value="0">Bình Thường</option>
                                <option value="1">Hỏng</option>
                            @else
                                <option  value="0">Bình Thường</option>
                                <option selected value="1">Hỏng</option>
                            @endif
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Sự Cố</label>
                        <input type="text" name="comment" class="form-control" id="exampleInputEmail1" value="{{$mt->Comment}}" >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">PMT</label>
                        <select name="category_id" class="form-control input-sm m-bot15" >
                        @foreach($mapmt as  $mapmtc)
                                @if($mapmtc->MaPMT==$mt->MaPMT)
                                <option selected value="{{$mapmtc->MaPMT}}">{{$mapmtc->TenPMT}}</option>
                                @else
                                <option value="{{$mapmtc->MaPMT}}">{{$mapmtc->TenPMT}}</option>
                                @endif
                            @endforeach
                            
                        </select>
                    </div>
                    <button type="submit" name="add_mt" class="btn btn-info">Xử Lý</button>
                    </form>
                    @endforeach
                </div>

            </div>
        </section>

</div>
@endsection