@extends('layouts.app')

@section('content')

        <h2>Danh sách liên hệ</h2>
        <div class="col-md-12">
            <a href="{{ route('client.create') }}" class="btn btn-primary float-right m-2 mb-2" role="button" aria-pressed="true">Thêm liên hệ</a>
        </div>
        <table class="table">
        <div class="mt-4 mb-4 d-flex align-items-center">
          <h4 class="mr-3">Chọn độ tuổi</h4>
          <a href="{{ route('client.index') . '?old=18-25' }}" type="submit" class="btn btn-secondary mr-3">18-25</a>
          <a href="{{ route('client.index') . '?old=26-30' }}" type="submit" class="btn btn-secondary mr-3">26-30</a>
          <a href="{{ route('client.index') . '?old=31-45' }}" type="submit" class="btn btn-secondary mr-3">31-45</a>
          <a href="{{ route('client.index') . '?old=46-60' }}" type="submit" class="btn btn-secondary mr-3">46-60</a>
        </div>
      <thead>
        <tr>
          <th scope="col">Họ và tên</th>
          <th scope="col">Email</th>
          <th scope="col">Số điện thoại </th>
          <th scope="col">Ngày sinh</th>
          <th></th>
          <th></th>
        </tr>
      </thead>
      <tbody>
        @foreach($clients as $client)
        <tr>
          <td>{{ $client->name }}</td>
          <td>{{ $client->email }}</td>
          <td>{{ $client->phone }}</td>
          <td class="birth">{{ date('d-m-Y', strtotime($client->birthday)) }}</td>
          <td>
          <a href="{{ route('client.edit', $client->id) }}" class="btn btn-success">Sửa</a>
          <td>
          <a href="" data-url="{{ route('client.delete', $client->id) }}" class="btn btn-danger action_delete">Xóa</a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>

    

@endsection

@section('js')
  <!-- import thư viện JS Sweetalert2 -->
  <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <!-- import thư viện JS -->
  <script src="{{ asset('public\index.js') }}"></script>
@endsection