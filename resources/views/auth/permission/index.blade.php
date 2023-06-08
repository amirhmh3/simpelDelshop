@extends('layouts.front')

@section('content')
    <div class="content-wrapper">
    <section class="content pt-3">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h1>نقش</h1>
                            <div class="card-body">

                                <form action="permission/role" method="post">
                                    @csrf
                                    <div class="form-group col-md-4">
                                        <select id="inputState" name="guard_name" class="form-control">
                                            <option value="web" selected>web</option>
                                            <option value="api">api</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">نقش</label>
                                        <input type="text" name="name" class="form-control" id="exampleInputPassword1" placeholder="نقش">
                                    </div>
                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h1>مجوز</h1>
                            <div class="card-body">
                                <form method="post">
                                    @csrf
                                    <div class="form-group col-md-4">
                                        <select id="inputState" name="guard_name" class="form-control">
                                            <option value="web" selected>web</option>
                                            <option value="api" >api</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="inputState">State</label>
                                        <select id="inputState" name="role_id" class="form-control">
                                            <option value="0" selected>Choose...</option>
                                            @foreach($datas['role'] as $data)
                                                <option value="{{$data["id"]}}">{{$data["name"]}}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleInputPassword1">مجوز</label>
                                        <input type="text" name="name" class="form-control" id="exampleInputPassword1" placeholder="مجوز">
                                    </div>

                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>


            </div>



            <div class="row">
                <div class="col-md-6">
                    @include('auth.permission.gridRole',['datas'=>$datas['role'],'permissions'=>$datas['permission']])
                </div>



                <div class="col-md-6">
                    @include('auth.permission.gridPermission',['datas'=>$datas['permission'],'roles'=>$datas['role']])
                </div>


            </div>


        </div>
    </section>

    </div>




@endsection
