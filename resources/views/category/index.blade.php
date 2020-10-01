@extends('layouts.app')
@section('css')
    <link rel="stylesheet" href="https://rawgit.com/adrotec/knockout-file-bindings/master/knockout-file-bindings.css">
@endsection
@section('content')


    <br><br>
    <button type="button" class="btn btn-primary" data-toggle="modal" href='#add-modal'>+Add New</button>

    <br><br>
    <table class="table table-bordered" id="users-table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Danh Mục Cha</th>
            <th>Hành Động</th>
        </tr>
        </thead>
    </table>


    <!-- The Modal -->
    <div class="modal" id="add-modal">
        <div class="modal-dialog" style="max-width: 700px;">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Thêm mới</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <form id="add-form" action="{{asset('/categories')}}" method="POST">
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Tên</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Danh Mục Chứa</label>
                            <select class="form-control" id="parent_id" name="parent_id">
                                <option class="category" value="0">Danh mục chính</option>
                                @foreach($categories as $category)
                                    <option id="category_{{$category['id']}}" class="category"
                                            value="{{$category['id']}}">{{$category['name']}}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>

                    <input type="hidden" name="id" id="eid">
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- The Modal -->
    <div class="modal" id="configuration">
        <div class="modal-dialog" style="max-width: 700px;">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Phân quyền</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <form id="add-form" action="{{asset('/configuration/category')}}" method="POST">
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="name">Tên</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
                        </div>
                    </div>

                    <input type="hidden" name="id" id="eid">
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>



@endsection

@section('js')
    <script src="{{ asset('js/main/category.js') }}"></script>
@endsection
