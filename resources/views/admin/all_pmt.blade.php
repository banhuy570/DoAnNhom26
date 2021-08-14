@extends('admin_layout')
@section('admin_content')
    <div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Danh Sách Phòng Máy Tính
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
            <th>MaPMT</th>
            <th>TenPMT</th>
            <th>SL Máy</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_pmt as  $pmt)
          <tr>
            <td>{{ $pmt->MaPMT }}</td>
            <td>{{ $pmt->TenPMT }}</td>
            <td>{{ $pmt->SLMay }}</td>
            <td>
              <a href="{{ route('pmt.edit', $pmt->MaPMT)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i></a>
              <a onclick="return confirm('Bạn có chắc là muốn xóa tin này ko?')" href="{{ route('pmt.delete', $pmt->MaPMT)}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <div style="text-align: center;">{{ $all_pmt->links() }}</div>
    </div>
  </div>
</div>
@endsection