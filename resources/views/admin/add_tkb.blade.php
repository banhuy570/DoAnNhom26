@extends('admin_layout')
@section('admin_content')
<div class="row">
<div class="col-lg-12">
    <section class="panel">
        <header class="panel-heading">
           Thêm Thời Khóa Biểu
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
               
                <form role="form" action="{{ route('tkb.save')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                <div class="form-group">
                    <label for="exampleInputEmail1">Môn Học</label>
                    <select name="monhoc" class="form-control input-sm m-bot15" >
                            @foreach($mamh as  $mh)
                                <option selected value="{{$mh->MaMH}}">{{$mh->TenMH}}</option>
                            @endforeach
                                
                        </select>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Tên GV</label>
                    <input type="text" data-validation="length" data-validation-length="min10" data-validation-error-msg="Làm ơn điền ít nhất 10 ký tự" name="tengv" class="form-control" id="exampleInputEmail1" placeholder="Mã PMT" required="true">
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
                    <label for="exampleInputEmail1">SL</label>
                    <input type="text" name="sl" class="form-control" id="exampleInputEmail1"  required="true" >
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">PMT</label>
                    <select name="category_id" class="form-control input-sm m-bot15" >
                        @foreach($mapmt as  $mapmtc)
                                
                            <option selected value="{{$mapmtc->MaPMT}}">{{$mapmtc->TenPMT}}</option>
                        @endforeach
                    </select>
                </div>
                     
                <button type="submit" name="add_tkb" class="btn btn-info">Thêm</button>
                </form>
            </div>

        </div>
    </section>

</div>
@endsection