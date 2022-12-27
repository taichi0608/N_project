@extends('searching.search_layouts.layout')
@section('searching.layout.title', '部門集計マスタ：新規作成')

@section('searching.content')

<div class="container">

    <div class="change_nav">
        @include('searching.search_layouts.page_nav')<!-- 新規作成などのページ遷移ナビゲーションを継承 -->
    </div>
    <div class="wrap">
    
        @if (!empty($categories))
        <form method="POST" action="{{ route('search.store') }}" onSubmit="return checkSubmit()">
            @csrf
    
            <select class="form-select" aria-label="Default select example" name="category_id">
                <option value="" selected>関連する部門を選択してください</option>
            @foreach ($categories as $category)
                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
            @endforeach
            </select>
            @if ($errors->has('category_id'))
                <div class="text-danger validation_err">{{ $errors->first('category_id') }}</div>
            @endif
            
          
            <div class="mt-3 d-flex">
                <label for="SummarySectionName" class="form-label col-4">集計部門名称</label>
                <input type="text" class="form-control" id="SummarySectionName" name="SummarySectionName" value="{{ old('SummarySectionName') }}">
            </div>
            @if ($errors->has('SummarySectionName'))
                <div class="text-danger validation_err">{{ $errors->first('SummarySectionName') }}</div>
            @endif

            <div class="mt-3 d-flex">
                <label for="product_ab_name" class="form-label col-4">集計部門略称</label>
                <input type="text" class="form-control" id="product_ab_name" name="product_ab_name" value="{{ old('product_ab_name') }}">
            </div>
            @if ($errors->has('product_ab_name'))
                <div class="text-danger validation_err">{{ $errors->first('product_ab_name') }}</div>
            @endif

            <div class="mt-3 d-flex">
                <label for="SummarySectionCode" class="form-label col-4">集計部門コード</label>
                <input type="text" class="form-control" id="SummarySectionCode" name="SummarySectionCode" value="{{ old('SummarySectionCode') }}">
            </div>
            @if ($errors->has('SummarySectionCode'))
                <div class="text-danger validation_err">{{ $errors->first('SummarySectionCode') }}</div>
            @endif

            <div class="mt-5">
              <a class="btn btn-secondary" href="{{ route('search.index') }}">
                  キャンセル
              </a>
              <button type="submit" class="btn btn-primary">
                  作成する
              </button>
            </div>
    
        </form>
        @endif
    </div>
</div>

@endsection

