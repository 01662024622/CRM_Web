@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="/css/review360/main.css">
@endsection
@section('content')

    <br><br>
    <table class="table table-bordered" id="users-table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Người Dùng</th>
            <th>Phòng Ban</th>
            <th>Nội dung</th>
            <th>Ghi chú</th>
            <th>Phản Hồi</th>
        </tr>
        </thead>
    </table>

@endsection

@section('js')
    <script src="{{ asset('js/review360/main.js') }}"></script>
@endsection
