@extends('admin_layout')
@section('admin_content')
<div class="row">
<div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
               Xử Lý Máy Tính Hỏng
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
                    @foreach($edit_mt as $key => $mt)
                    <form role="form" action="{{ route('mt.update', $mt->MaMT)}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Mã Máy Tính</label>
                        <input type="text" name="" class="form-control" id="exampleInputEmail1" value="{{$mt->MaMT}}" readonly>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Bàn Phím</label>
                        @if($mt->BanPhim == 0 )
                        <input type="text" name="banphim" class="form-control" id="exampleInputEmail1" value="Bình Thường" readonly>
                        @else
                        <input type="text" name="banphim" class="form-control" id="exampleInputEmail1" value="Hỏng" readonly>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Chuột</label>
                        @if($mt->Chuot == 0 )
                        <input type="text" name="chuot" class="form-control" id="exampleInputEmail1" value="Bình Thường" readonly>
                        @else
                        <input type="text" name="banphim" class="form-control" id="exampleInputEmail1" value="Hỏng" readonly>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Màn Hình</label>
                        @if($mt->ManHinh == 0 )
                        <input type="text" name="manhinh" class="form-control" id="exampleInputEmail1" value="Bình Thường" readonly>
                        @else
                        <input type="text" name="banphim" class="form-control" id="exampleInputEmail1" value="Hỏng" readonly>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Thùng Máy</label>
                        @if($mt->ThungMay == 0 )
                        <input type="text" name="thungmay" class="form-control" id="exampleInputEmail1" value="Bình Thường" readonly>
                        @else
                        <input type="text" name="banphim" class="form-control" id="exampleInputEmail1" value="Hỏng" readonly>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Ứng Dụng</label>
                        @if($mt->UngDung == 0 )
                        <input type="text" name="UngDung" class="form-control" id="exampleInputEmail1" value="Bình Thường" readonly>
                        @else
                        <input type="text" name="banphim" class="form-control" id="exampleInputEmail1" value="Hỏng" readonly>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Sự Cố</label>
                        <input type="text" name="comment" class="form-control" id="exampleInputEmail1" value="{{$mt->Comment}}" readonly>
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