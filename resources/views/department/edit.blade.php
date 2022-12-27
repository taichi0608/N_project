@extends('department.department_layouts.layout')
@section('department.department_layouts.layout.title', '部門マスタ：編集・削除')

@section('department.content')

<div class="container form-wrap">
    <div class="change_nav">
        @include('department.department_layouts.page_nav')<!-- 新規作成などのページ遷移ナビゲーションを継承 -->
    </div>
    <div class="wrap">
        <form method="POST" action="{{ route('department.update') }}" onSubmit="return checkSubmit()">
            @csrf
            <!-- id受け取り -->
            <input type="hidden" name="id" value="{{ $input['id'] }}"> 
            <div class="department_cd input_wrap">
                <label for="category_code" class="form-label label">部門コード</label>
                <input type="text" class="form-control input_box" id="category_code" name="category_code"  value="{{ $input['category_code'] }}">
            </div>
            @if ($errors->has('category_code'))
            <div class="text-danger err_m">{{ $errors->first('category_code') }}</div>
            @endif

            <div class="department_name input_wrap">
                <label for="category_name" class="form-label label">部門名称</label>
                <input type="text" class="form-control input_box" id="category_name"  name="category_name" value="{{ $input['category_name'] }}">
            </div>
            @if ($errors->has('category_name'))
            <div class="text-danger err_m">{{ $errors->first('category_name') }}</div>
            @endif

            <div class="department_ab_name input_wrap">
                <label for="category_ab_name" class="form-label label">部門略称</label>
                <input type="text" class="form-control input_box" id="category_ab_name" name="category_ab_name"  value="{{ $input['category_ab_name'] }}">
            </div>
            @if ($errors->has('category_ab_name'))
            <div class="text-danger err_m">{{ $errors->first('category_ab_name') }}</div>
            @endif

            <div class="department_payfor input_wrap m-0">
                <p class="input_wrap">立替区分</p>
                <div class="input_wrap">
                    <div class="form-check department_payfor">
                        <input class="form-check-input" type="radio" name="PayFor" id="PayFor1" value="あり">
                        <label class="form-check-label ps-2" for="PayFor1">
                            あり
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="PayFor" id="PayFor2"  value="なし" checked>
                        <label class="form-check-label ps-2" for="PayFor2">
                            なし
                        </label>
                    </div>
                </div>
            </div>
            @if ($errors->has('PayFor'))
            <div class="text-danger err_m">{{ $errors->first('PayFor') }}</div>
            @endif
            
            <div class="input_wrap">
                <label for="DisplayOrder" class="form-label label">表示順</label>
                <select id="DisplayOrder" class="form-select input_box" name="DisplayOrder">
                    <option value="{{ $input['DisplayOrder'] }}" selected>{{ $input['DisplayOrder'] }}</option>
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
                    <input name="Hidden" type="hidden" value="表示">
                    <input class="form-check-input" type="checkbox" id="Hidden" name="Hidden" value="非表示">
                </div>
            </div>

            <div class="mt-5 d-inline-block">
                <a class="btn btn-secondary" href="{{ route('department.list') }}">
                    キャンセル
                </a>
                <button type="submit" class="btn btn-primary ms-4">
                    変更する
                </button>
            </div>
        </form>
        <!-- 削除ボタン -->
        <form class="card-body delete" action="{{ route('department.delete') }}" method="POST" onSubmit="return checkDestroy()">
            @csrf
            <input type="hidden" name="id" value="{{ $input->id }}">
            <button type="submit" class="btn btn-danger">削除する</button>
        </form>
        
    </div>
</div>
@endsection
