<div class="card">
    <div class="card-header">
        <h1>لیست مجوز</h1>
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
                            <form action="permission/give/role" method="post">
                                @csrf
                                <input type="hidden" name="name" value="{{$data["name"]}}">
                                <input type="hidden" name="guard_name" value="{{$data["guard_name"]}}">

                                <div class="form-group col-md-4 d-inline-flex">
                                    <select id="inputState" name="role_id" class="form-control">
                                        <option value="0" selected>همه</option>
                                        @foreach($roles as $role)

                                            <option value="{{$role["id"]}}">{{$role["name"]}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-2 d-inline-flex">
                                    <button type="submit" class="btn btn-success">accept</button>
                                </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
