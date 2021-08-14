@extends('admin_layout')
@section('admin_content')
<div class="row">
<div class="col-lg-12">
        <section class="panel">
            <header class="panel-heading">
               Thêm máy tính
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
                    <form role="form" action="{{ route('mt.save')}}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}
                    <div class="form-group">
                        <label for="exampleInputEmail1">Mã Máy Tính</label>
                        <input type="text" data-validation="length" data-validation-length="min10" data-validation-error-msg="Làm ơn điền ít nhất 10 ký tự" name="mamt" class="form-control" id="exampleInputEmail1" placeholder="Mã PMT" required="true">
                    </div>
                    
                    <div class="form-group">
                    <label for="exampleInputEmail1">PMT</label>
                    <select name="category_id" class="form-control input-sm m-bot15" >
                        @foreach($mapmt as  $mapmtc)
                                
                            <option selected value="{{$mapmtc->MaPMT}}">{{$mapmtc->TenPMT}}</option>
                        @endforeach
                    </select>
                </div>
                    
                    <button type="submit" name="add_pmt" class="btn btn-info">Thêm Máy Tính</button>
                    </form>
                </div>

            </div>
        </section>

</div>
@endsection