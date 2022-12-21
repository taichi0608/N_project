@extends('layouts.app')

@section('content')
<div class="container">
    <nav class="department_nav_list">
        <p class="department_nav_item"><a href="{{ route('list') }}">部門マスタ</a></p>
        <p class="department_nav_item"><a href="{{ route('s_list') }}">部門集計</a></p>
    </nav>
</div>
@endsection
