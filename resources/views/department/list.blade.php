@extends('department.department_layouts.layout')
@section('department.department_layouts.layout.title', '部門マスタ：一覧表示')

@section('department.content')

<div class="container">

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
            <table class="table table-table-hover">
                <thead style="background-color: #0d6efd; color:#fff; text-align:center">
                    <tr>
                        <th>
                            <form action="{{route('department.list')}}">
                                <button type="submit" name="sort" value="@if (!isset($sort) || $sort !== '3') 3 @elseif ($sort === '3') 4 @endif">部門コード</button>
                            </form>
                        </th>
                        <th>部門名称</th>
                        <th>部門略称</th>
                        <th>
                            <form action="{{route('department.list')}}">
                                <button type="submit" name="sort" value="@if (!isset($sort) || $sort !== '5') 5 @elseif ($sort === '5') 6 @endif">立替</button>
                            </form>
                        </th>
                        <th><!-- ソート機能 -->
                            <form action="{{route('department.list')}}">
                                <button type="submit" name="sort" value="@if (!isset($sort) || $sort !== '1') 1 @elseif ($sort === '1') 2 @endif">表示順</button>
                            </form>
                        </th>
                        <th>非表示</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                @foreach($inputs as $input)
                <tr style="vertical-align:middle; text-align:center">
                    <td>{{ $input['category_code'] }}</td>
                    <td>{{ $input['category_name'] }}</td>
                    <td>{{ $input['category_ab_name'] }}</td>
                    <td>{{ $input['PayFor'] }}</td>
                    <td>{{ $input['DisplayOrder'] }}</td>
                    <td>{{ $input['Hidden'] }}</td>
       
                    <!-- <td><a href="/department/detail/{{ $input['id'] }}" class="btn btn-primary btn-sm">詳細表示</a></td> -->
                    <td><a href="/department/edit/{{ $input['id'] }}" class="btn btn-primary btn-sm">編集・削除</a></td>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
</body>
</html>
@endsection

