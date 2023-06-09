@extends('layouts.frontLogin')

@section('content')



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
                                        @can('show file')
                                        <th>action</th>
                                        @endcan
                                    </tr>
                                    @foreach($datas as $data)
                                        <tr>
                                            <td>{{$data["id"]}}</td>
                                            <td>{{$data["title"]}}</td>
                                            @can('show file')
                                            <td>
                                                <form action="file" method="post">

                                                    @csrf
                                                    <input type="hidden" name="post_id" value="{{$data["id"]}}" >
                                                    <input class="btn btn-success" type="submit" value="action">
                                                </form></td>
                                            @endcan
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
