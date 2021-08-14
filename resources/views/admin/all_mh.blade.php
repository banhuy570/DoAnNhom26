@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh Sách Máy Tính Bị Hỏng
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
            <th>Mã MT</th>
            <th>Bàn Phím</th>
            <th>Chuột</th>
            <th>Màn Hình</th>
            <th>Thùng Máy</th>
            <th>Ứng Dụng</th>
            <th>Comment</th>
            <th>Mã PMT</th>
            <th>Xử Lý</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_mh as  $mt)
          <tr>
            <td>{{ $mt->MaMT }}</td>
            @if (($mt->BanPhim) == 1)
              <td>Hỏng</td>
            @else
              <td>Bình Thường</td>
            @endif
            @if (($mt->Chuot) == 1)
              <td>Hỏng</td>
            @else
              <td>Bình Thường</td>
            @endif
            @if (($mt->ManHinh) == 1)
              <td>Hỏng</td>
            @else
              <td>Bình Thường</td>
            @endif
            @if (($mt->ThungMay) == 1)
              <td>Hỏng</td>
            @else
              <td>Bình Thường</td>
            @endif
            @if (($mt->UngDung) == 1)
              <td>Hỏng</td>
            @else
              <td>Bình Thường</td>
            @endif
            <td>{{ $mt->Comment }}</td>
            <td>{{ $mt->MaPMT }}</td>
            <td>
              <a href="{{ route('mt.edit', $mt->MaMT)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-check text-success text-active"></i></a>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <div style="text-align: center;">{{ $all_mh->links() }}</div>
    </div>
  </div>
</div>
@endsection