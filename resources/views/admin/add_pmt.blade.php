@extends('admin_layout')
@section('admin_content')
<div class="row">
<div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
               Thêm PMT
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
                    <form role="form" action="{{ route('pmt.save')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Mã PMT</label>
                        <input type="text" data-validation="length" data-validation-length="min10" data-validation-error-msg="Làm ơn điền ít nhất 10 ký tự" name="mapmt" class="form-control" id="exampleInputEmail1" placeholder="Mã PMT" required="true">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Tên PMT</label>
                        <input type="text" name="tenpmt" class="form-control" id="exampleInputEmail1" placeholder="Tên PMT" required="true">
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">SL</label>
                        <input type="text" name="sl" class="form-control" id="exampleInputEmail1" required="true">
                    </div>
                    
                    <button type="submit" name="add_pmt" class="btn btn-info">Thêm PMT</button>
                    </form>
                </div>

            </div>
        </section>

</div>
@endsection