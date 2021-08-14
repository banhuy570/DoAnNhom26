@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Thống Kê Danh Sách Máy Tính Hỏng
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th>Mã MT</th>
            <th>Mã PMT</th>
            <th>Số Lần Hỏng</th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_tkmth as  $mth)
          <tr>
            <td>{{ $mth->MaMT }}</td>
            <td>{{ $mth->MaPMT }}</td>
            <td>{{ $mth->SLH }}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <div style="text-align: center;">{{ $all_tkmth->links() }}</div>
    </div>
  </div>
</div>
@endsection