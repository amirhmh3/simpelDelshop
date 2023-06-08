@extends('layouts.front')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>لیست کاربران</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>


        <section class="content">
            <div class="container-fluid">


                <div class="row">
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-body ">
                                    <form action="permission/colleague" method="post">
                                        @csrf
                                        <div class="form-group col-md-4 d-inline">
                                            <label for="inputState">کاربر</label>
                                            <select id="inputState" name="user_id" class="form-control ">
                                                <option value="0" selected>Choose...</option>
                                                @foreach($datas['users'] as $data)
                                                    <option value="{{$data["user_id"]}}">{{$data["name"]}}</option>
                                                @endforeach

                                            </select>
                                        </div>
                                        <div class="form-group col-md-4 d-inline">
                                            <label for="inputState">نقش</label>
                                            <select id="inputState" name="role_id" class="form-control">
                                                <option value="0" selected>Choose...</option>
                                                @foreach($datas['roles'] as $data)
                                                    <option value="{{$data["id"]}}">{{$data["name"]}}</option>
                                                @endforeach

                                            </select>
                                        </div>

                                        <button type="submit" class="btn btn-primary mt-2">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-9">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-body">
                                    <table class="table table-bordered" id="myTable">
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>فعالیت</th>
                                            <th>مجوز</th>
                                        </tr>
                                        @foreach($datas["users"] as $data)
                                            <tr>
                                                <td>{{$data["id"]}}</td>
                                                <td>{{$data["name"]}}</td>
                                                <td>
                                                    <form action="permission/colleague" method="post">
                                                        @csrf
                                                        @method('delete')
                                                        <input type="hidden" name="user_id" value="{{$data["user_id"]}}">
                                                        <div class="form-group col-md-4 d-inline-flex">
                                                            <select id="inputState" name="role_id" class="form-control">
                                                                <option value="0" selected>همه</option>
                                                                @foreach($data["roles"] as $id=>$name)
                                                                    <option value="{{$id}}">{{$name}}</option>
                                                                @endforeach
                                                            </select>
                                                        </div>
                                                        <div class="col-md-2 d-inline-flex">
                                                            <button type="submit" class="btn btn-danger ">delete</button>
                                                        </div>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>



            </div>
        </section>

    </div>

@endsection
