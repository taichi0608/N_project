@extends('department.department_layouts.layout')
@section('department.department_layouts.layout.title', '部門マスタ：一覧表示')

@section('department.content')

<div class="container">
    <h2>一覧表示</h2>

     @if(session('err_msg'))
        <p class="text-danger">
            {{ session('err_msg') }}
        </p>
    @endif

    <div class="change_nav">
        @include('department.department_layouts.page_nav')<!-- 新規作成などのページ遷移ナビゲーションを継承 -->
    </div>
    <div class="row">
        <div class="col-md-10 col-md-offset-2">
            <table class="table table-striped">
                <tr>
                    <th>部門コード</th>
                    <th>部門名称</th>
                    <th>部門略称</th>
                    <th>立替</th>
                    <th>表示順</th>
                    <th>非表示</th>
                    <th></th>
                   
                </tr>
                @foreach($inputs as $input)
                <tr>
                    <td><a href="/department/detail/{{ $input['id'] }}">{{ $input['SectionCode'] }}</a></td>
                    <td>{{ $input['SectionName'] }}</td>
                    <td>{{ $input['SectionAbName'] }}</td>
                    <td>{{ $input['PayFor'] }}</td>
                    <td>{{ $input['DisplayOrder'] }}</td>
                    <td>{{ $input['Hidden'] }}</td>
                    <td><a href="/department/edit/{{ $input['id'] }}">編集・削除</a></td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
</body>
</html>
@endsection

