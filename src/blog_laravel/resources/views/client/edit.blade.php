@extends('layouts.app')

@section('content')

<div class="mt-4">
    <form method="POST" action="{{ route('client.update', $client->id) }}">
        @csrf
    <div class="form-group">
        <label for="name">Họ và tên</label>
        <input type="text" name="name" class="form-control" id="name" value="{{ $client->name }}">
        @error('name')
            <div class="form-text text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" name="email" class="form-control" id="email" value="{{ $client->email }}">
        @error('email')
            <div class="form-text text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="form-group">
        <label for="phone">Số điện thoại</label>
        <input type="number" name="phone" class="form-control" id="phone" value="{{ $client->phone }}">
        @error('phone')
            <div class="form-text text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div class="">
    <div class="form-group">
    <label for="phone">Ngày sinh</label>
    <input type="date" id="birthday" name="birthday"min="1920-01-01" max="2021-12-31" class="form-control" value="{{ $client->birthday }}">
    </div>
    <div>
    <button type="submit" class="btn btn-success">Submit</button>
    </form>
</div>


@endsection