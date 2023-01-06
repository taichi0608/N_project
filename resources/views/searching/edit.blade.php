@extends('searching.search_layouts.layout')
@section('searching.layout.title', '部門集計マスタ：変更・削除')

@section('searching.content') 

<div class="container form-wrap">
  <div class="change_nav">
      @include('searching.search_layouts.page_nav')<!-- 新規作成などのページ遷移ナビゲーションを継承 -->
  </div>

  <form method="POST" action="{{ route('search.update') }}" onSubmit="return checkSubmit()" class="wrap">
    @csrf
    <input type="hidden" name="id" value="{{ $input->id }}">
    <input type="hidden" name="category_id" value="{{ $input->category_id }}">
    <!-- UPDATE_AT(コントローラーから文字列の)受け取り -->
    <input type="hidden" name="updated_at" value="{{ $before_time }}"> 
  
    <div class="mt-3 d-flex">
        <label for="SummarySectionName" class="form-label col-4">集計部門名称</label>
        <input type="text" class="form-control" id="SummarySectionName" name="SummarySectionName" value="{{ $input->SummarySectionName }}">
    </div>
    @if ($errors->has('SummarySectionName'))
        <div class="text-danger">{{ $errors->first('SummarySectionName') }}</div>
    @endif

    <div class="mt-3 d-flex">
        <label for="product_ab_name" class="form-label col-4">集計部門略称</label>
        <input type="text" class="form-control" id="product_ab_name" name="product_ab_name" value="{{ $input->product_ab_name }}">
    </div>
    @if ($errors->has('product_ab_name'))
        <div class="text-danger">{{ $errors->first('product_ab_name') }}</div>
    @endif

    <div class="mt-3 d-flex">
        <label for="SummarySectionCode" class="form-label col-4">集計部門コード</label>
        <input type="text" class="form-control" id="SummarySectionCode" name="SummarySectionCode" value="{{ $input->SummarySectionCode }}">
    </div>
    @if ($errors->has('SummarySectionCode'))
        <div class="text-danger">{{ $errors->first('SummarySectionCode') }}</div>
    @endif

    <div class="department_payfor input_wrap m-0">
        <p class="input_wrap">立替区分</p>
        <div class="input_wrap">
            <div class="form-check department_payfor">
                <input class="form-check-input" type="radio" name="PayFor" id="PayFor1" value="1">
                <label class="form-check-label ps-2" for="PayFor1">
                    あり
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="PayFor" id="PayFor2"  value="0" checked>
                <label class="form-check-label ps-2" for="PayFor2">
                    なし
                </label>
            </div>
        </div>
    </div>
    @if ($errors->has('PayFor'))
    <div class="text-danger err_m">{{ $errors->first('PayFor') }}</div>
    @endif
        
    <div class="input_wrap col-6">
        <label for="DisplayOrder" class="form-label label">表示順</label>
        <select id="DisplayOrder" class="form-select input_box" name="DisplayOrder">
            <option value="{{ $input->DisplayOrder }}">{{ $input->DisplayOrder }}</option>
            <option value="1" >1</option>
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
    @if ($errors->has('DisplayOrder'))
    <div class="text-danger err_m">{{ $errors->first('DisplayOrder') }}</div>
    @endif
    
    <div class="col-12">
        <div class="form-check input_wrap">
            <label class="form-check-label label" for="Hidden">非表示</label>
            <input name="Hidden" type="hidden" value="0">
            <input class="form-check-input" type="checkbox" id="Hidden" name="Hidden" value="1">
        </div>
    </div>
    @if ($errors->has('Hidden'))
    <div class="text-danger err_m">{{ $errors->first('Hidden') }}</div>
    @endif

    <div class="mt-5 d-inline-block">
        <a class="btn btn-secondary" href="{{ route('search.show') }}">
            キャンセル
        </a>
        <button type="submit" class="btn btn-primary ms-4">
            変更する
        </button>
    </div>
  </form>
  
  <form class="card-body delete" action="{{ route('search.destroy') }}" method="POST" onSubmit="return checkDestroy()">
      @csrf
      <input type="hidden" name="id" value="{{ $input->id }}">
      <button type="submit" class="btn btn-danger">削除する</button>
  </form>
      
</div>

@endsection


