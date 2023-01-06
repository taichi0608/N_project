@extends('department.department_layouts.layout')
@section('department.department_layouts.layout.title', '部門マスタ：新規作成')

@section('department.content')

<div class="container">
    <div class="change_nav">
        @include('department.department_layouts.page_nav')<!-- 新規作成などのページ遷移ナビゲーションを継承 -->
    </div>

    <div class="wrap">
        <form method="POST" action="{{ route('department.store') }}" onSubmit="return checkSubmit()">
            @csrf
            
            <div class="department_cd input_wrap">
                <label for="category_code" class="form-label label">部門CD</label>
                <input type="text" class="form-control input_box" id="category_code" name="category_code" placeholder="数値で入力して下さい" value="{{ old('category_code') }}">
            </div>
            @if ($errors->has('category_code'))
            <div class="text-danger err_m">{{ $errors->first('category_code') }}</div>
            @endif
        
            <div class="department_name input_wrap">
                <label for="category_name" class="form-label label">部門名称</label>
                <input type="text" class="form-control input_box" id="category_name"  name="category_name" placeholder="文字で入力して下さい" value="{{ old('category_name') }}">
            </div>
            @if ($errors->has('category_name'))
            <div class="text-danger err_m">{{ $errors->first('category_name') }}</div>
            @endif

            <div class="department_ab_name input_wrap">
                <label for="category_ab_name" class="form-label label">部門略称</label>
                <input type="text" class="form-control input_box" id="category_ab_name" name="category_ab_name"  placeholder="文字で入力して下さい" value="{{ old('category_ab_name') }}">
            </div>
            @if ($errors->has('category_ab_name'))
            <div class="text-danger err_m">{{ $errors->first('category_ab_name') }}</div>
            @endif

            <div class="department_payfor input_wrap m-0">
                <p class="input_wrap">立替区分</p>
                <div class="input_wrap">
                    <div class="form-check department_payfor">
                        <input class="form-check-input" type="radio" name="PayFor" id="PayFor1" value="13">
                        <label class="form-check-label ps-2" for="PayFor1">
                            あり
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="PayFor" id="PayFor2"  value="30" checked>
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

            
            <div class="col-12 department_btn">
                <button type="submit" class="btn btn-primary">確定</button>
            </div>
        </form>
    </div>

</div>

@endsection
