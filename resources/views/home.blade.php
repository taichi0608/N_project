@extends('department.department_layouts.layout')
@section('department.department_layouts.layout.title', '部門マスタ：新規作成')

@section('department.content')
<div class="container">
    <nav class="department_nav_list">
        <p class="department_nav_item"><a href="{{ route('department.list') }}">部門マスタ</a></p>
        <p class="department_nav_item"><a href="{{ route('search.show') }}">部門集計</a></p>
    </nav>
</div>
@endsection
