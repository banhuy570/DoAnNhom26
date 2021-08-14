@extends('admin_layout')
@section('admin_content')
<div class="row">
<div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
               Cập nhật PMT
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
                    @foreach($edit_pmt as $key => $pmt)
                    <form role="form" action="{{ route('pmt.update', $pmt->MaPMT)}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Mã PMT</label>
                        <input type="text" name="mapmt" class="form-control" id="exampleInputEmail1" value="{{$pmt->MaPMT}}">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên PMT</label>
                        <input type="text" name="tenpmt" class="form-control" id="exampleInputEmail1" value="{{$pmt->TenPMT}}">
                    </div>
                     <div class="form-group">
                        <label for="exampleInputEmail1">SL</label>
                        <input type="text" name="sl" class="form-control" id="exampleInputEmail1" value="{{$pmt->SLMay}}">
                    </div>
                     <div class="form-group">
                        <label for="exampleInputEmail1">TT</label>
                        <input type="text" name="tt" class="form-control" id="exampleInputEmail1" value="{{$pmt->TinhTrang}}">
                    </div>
                      
                     
                    <button type="submit" name="add_pmt" class="btn btn-info">Cập nhật tin tức</button>
                    </form>
                    @endforeach
                </div>

            </div>
        </section>

</div>
@endsection