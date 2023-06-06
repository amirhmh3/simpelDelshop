@extends('layouts.front')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>کیف پول</h1>
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
                                    <table class="table table-bordered" id="myTable">
                                        <tr>
                                            <th style="width: 10px">#</th>
                                            <th>فعالیت</th>
                                        </tr>
                                        @foreach($datas as $data)
{{--                                            {{dd($data)}}--}}
                                            <tr>
                                                <td>{{$data["id"]}}</td>
                                                <td>{{$data["money"]}}</td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>


                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header">
                                <h1>موجودی</h1>
                                <div class=card-body">
                                    @php
                                        $wallet=0;
                                    foreach($datas as $data){
                                        $wallet+=$data["money"];
                                    }
                                    @endphp

                                    <h3>{{$wallet}}</h3>

                                </div>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </section>

    </div>

@endsection
