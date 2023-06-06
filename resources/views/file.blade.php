@extends('layouts.frontLogin')

@section('content')



    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card p-5">

                        <form action="store" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="post_id" value="{{$data["post_id"]}}">
                            <input type="hidden" name="file_type_id" value="1">
                            <div class="form-group">
                                <label for="exampleFormControlFile1">Example file input</label>
                                <input type="file" name="file" class="form-control-file" id="exampleFormControlFile1">
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </section>

    </div>

@endsection
