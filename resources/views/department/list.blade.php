@extends('layouts.app')
@section('content')

<div class="container">
    <h2>一覧</h2>
    <nav class="department_nav_list">
        <p class="department_nav_item picup"><a href="{{ route('list') }}">一覧表示</a></p>
        <p class="department_nav_item"><a href="{{ route('create') }}">新規登録</a></p>
   
    </nav>
    <div class="row">
        <div class="col-md-10 col-md-offset-2">
            
                @if(session('err_msg'))
                <p class="text-danger">
                    {{ session('err_msg') }}
                </p>
                @endif

            <table class="table table-striped">
                <tr>
                    <th>部門コード</th>
                    <th>部門名称</th>
                    <th>部門略称</th>
                    <th>立替</th>
                    <th>表示順</th>
                    <th>非表示</th>
                </tr>
                @foreach($inputs as $input)
                <tr>
                    <td><a href="/department/detail/{{ $input['id'] }}">{{ $input['SectionCode'] }}</a></td>
                    <td>{{ $input['SectionName'] }}</td>
                    <td>{{ $input['SectionAbName'] }}</td>
                    <td>{{ $input['PayFor'] }}</td>
                    <td>{{ $input['DisplayOrder'] }}</td>
                    <td>{{ $input['Hidden'] }}</td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
</body>
</html>
@endsection

