@extends('searching.search_layouts.layout')
@section('searching.layout.title', '部門集計マスタ：一覧表示')

@section('searching.content')

<div class="container">
  <div class="change_nav">
    @include('searching.search_layouts.page_nav')<!-- 新規作成などのページ遷移ナビゲーションを継承 -->
  </div>
  @include('searching.search_layouts.search_nav')<!-- 検索バーを継承 -->
</div>

@endsection
   

