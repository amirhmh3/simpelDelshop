<div class="card">
    <div class="card-header">
        <h1>لیست نقش</h1>
        <div class="card-body">
            <table class="table table-bordered" id="myTable">
                <tr>
                    <th style="width: 10px">#</th>
                    <th>فعالیت</th>
                    <th>گارد</th>
                    <th>action</th>
                </tr>
                @foreach($datas as $data)
                    <tr>
                        <td>{{$data["id"]}}</td>
                        <td>{{$data["name"]}}</td>
                        <td>{{$data["guard_name"]}}</td>
                        <td>
                            <form action="permission/role/permission" method="post">
                                @method('delete')
                                @csrf
                                <input type="hidden" name="role_id" value="{{$data["id"]}}">

                                <div class="form-group col-md-4 d-inline-flex">
                                    <select id="inputState" name="name" class="form-control">
                                        <option value="0" selected>همه</option>
                                        @foreach($data["permission"] as $key=>$val)
                                            <option value="{{$key}}">{{$val}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2 d-inline-flex">
                                    <button type="submit" class="btn btn-danger">delete</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
