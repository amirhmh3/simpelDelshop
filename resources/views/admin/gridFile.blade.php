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
                                            @can('edit file')
                                                <th>action</th>
                                            @endcan
                                        </tr>
                                        @foreach($datas as $data)
                                            <tr>
                                                <td>{{$data["id"]}}</td>
                                                <td>{{$data["url"]}}</td>
                                                @if(!$data["status"])
                                                    @can('edit file')
                                                        <td>
                                                            <form action="file/{{$data["id"]}}" method="post">
                                                                @csrf
                                                                @method("put")
                                                                <input type="hidden" name="status" value="1">
                                                                <input class="btn btn-success" type="submit"
                                                                       value="accept">
                                                            </form>
                                                        </td>
                                                    @endcan
                                                @endif

                                                @if($data["status"])

                                                    @can('sendWallet')
                                                        <td>
                                                            <form action="wallet" method="post">
                                                                @csrf
                                                                <input type="hidden" name="costumer_id" value="{{$data["customer_id"]}}">
                                                                <div class="form-group d-inline-flex">
                                                                    <input type="text" name="money" class="form-control" id="exampleInputPassword1" placeholder="مبلغ">
                                                                </div>
                                                                <div class="col-md-2 d-inline-flex">
                                                                    <button type="submit" class="btn btn-success">send Money</button>
                                                                </div>
                                                            </form>
                                                        </td>
                                                    @endcan
                                                @endif
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
