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

            <div class="department_payfor input_wrap m-0">
                <p class="input_wrap">立替区分</p>
                <div class="input_wrap">
                    <div class="form-check department_payfor">
                        <input class="form-check-input" type="radio" name="PayFor" id="PayFor1" value="0">
                        <label class="form-check-label ps-2" for="PayFor1">
                            あり
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="PayFor" id="PayFor2"  value="1" checked>
                        <label class="form-check-label ps-2" for="PayFor2">
                            なし
                        </label>
                    </div>
                </div>
            </div>
            @if ($errors->has('PayFor'))
                <div class="text-danger validation_err">{{ $errors->first('PayFor') }}</div>
            @endif

            <div class="input_wrap col-6">
                <label for="DisplayOrder" class="form-label label">表示順</label>
                <select id="DisplayOrder" class="form-select input_box ms-4" name="DisplayOrder">
                    <option value="1" selected>1</option>
                    <option value="2" >2</option>
                    <option value="3" >3</option>
                    <option value="4" >4</option>
                    <option value="5" >5</option>
                    <option value="6" >6</option>
                    <option value="7" >7</option>
                    <option value="8" >8</option>
                    <option value="9" >9</option>
                    <option value="10" >10</option>
                </select>
            </div>
            @if ($errors->has('displayOrder'))
                <div class="text-danger validation_err">{{ $errors->first('displayOrder') }}</div>
            @endif

            <div class="mt-3 d-flex">
                <div class="form-check input_wrap">
                    <label class="form-check-label label" for="Hidden">非表示</label>
                    <input name="Hidden" type="hidden" value="0">
                    <input class="form-check-input" type="checkbox" id="Hidden" name="Hidden" value="1">
                </div>
            </div>
            @if ($errors->has('Hidden'))
                <div class="text-danger validation_err">{{ $errors->first('Hidden') }}</div>
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

