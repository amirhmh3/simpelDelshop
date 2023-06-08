@extends('layouts.front')
@section('content')

    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>لیست همکاران</h1>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>


        <section class="content">
            <div class="container-fluid">


                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-body">
                                    <form method="post">
                                        @csrf
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">نام</label>
                                            <input type="email" name="email" class="form-control" id="exampleInputPassword1" placeholder="مجوز">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">فامیل</label>
                                            <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="مجوز">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">تکرار رمز</label>
                                            <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword1" placeholder="مجوز">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">نام</label>
                                            <input type="text" name="name" class="form-control" id="exampleInputPassword1" placeholder="مجوز">
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">فامیل</label>
                                            <input type="text" name="family" class="form-control" id="exampleInputPassword1" placeholder="مجوز">
                                        </div>

                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>



            </div>
        </section>
    </div>


@endsection
