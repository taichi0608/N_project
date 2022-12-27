@extends('searching.search_layouts.layout')
@section('searching.layout.title', 'ホーム')

@section('searching.content') 

<div class="container">
  <div class="change_nav">
    @include('searching.search_layouts.page_nav')<!-- 新規作成などのページ遷移ナビゲーションを継承 -->
  </div>
  項目を選択してください。


</div>

@endsection