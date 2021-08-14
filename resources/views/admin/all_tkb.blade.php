@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Thời Khóa Biểu 
    </div>
    <div class="table-responsive">
        <?php
              $message = Session::get('message');
              if($message){
                  echo '<span class="text-alert">'.$message.'</span>';
                  Session::put('message',null);
              }
              ?>
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Mã TKB</th>
            <th>Môn Học</th>
            <th>Tên GV</th>
            <th>Thứ</th>
            <th>Từ Tiết</th>
            <th>Đến Tiết</th>
            <th>SL</th> 
            <th>Mã PMT</th>
            <th>Action</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_tkb as $key => $cate)
          <tr>
            <td>{{ $cate->MaTKB }}</td>
            <td>{{ $cate->MaMH }}</td>
            <td>{{ $cate->TenGV }}</td>
            <td>{{ $cate->Thu }}</td>
            <td>{{ $cate->TuTiet }}</td>
            <td>{{ $cate->DenTiet }}</td>
            <td>{{ $cate->SoLuongSV }}</td>
            <td>{{ $cate->MaPMT }}</td>
            <td>
              <a href="{{ route('tkb.edit1',$cate->MaTKB)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i></a>
              <a onclick="return confirm('Bạn có chắc là muốn xóa ko?')" href="{{ route('tkb.delete',$cate->MaTKB)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <div style="text-align: center;">{{ $all_tkb->links() }}</div>
    </div>
  </div>
</div>
@endsection