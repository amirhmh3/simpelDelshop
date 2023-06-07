<div class="card">
    <div class="card-header">
        <h1>لیست نقش</h1>
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
