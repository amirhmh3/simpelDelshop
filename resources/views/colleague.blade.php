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
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="card-body">
                                    <table class="table table-bordered" id="myTable">
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>فعالیت</th>
                                        </tr>
                                        @foreach($datas as $data)
                                            <tr>
                                                <td>{{$data["id"]}}</td>
                                                <td>{{$data["name"]}}</td>
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
