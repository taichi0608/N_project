@extends('layouts.app')

@section('content')
<div class="container">
    <h2>登録画面</h2>
        @if(session('err_msg'))
        <p class="text-danger">
            {{ session('err_msg') }}
        </p>
        @endif
    <nav class="department_nav_list">
        <p class="department_nav_item"><a href="{{ route('list') }}">一覧表示</a></p>
        <p class="department_nav_item picup"><a href="{{ route('create') }}">新規登録</a></p>
    </nav>

    <div class="">
        <div class="">
            <div class="">
                <form method="POST" action="{{ route('store') }}" onSubmit="return checkSubmit()">
                    @csrf
                    
                    <div class="department_cd input_wrap">
                        <label for="SectionCode" class="form-label label">部門CD</label>
                        <input type="text" class="form-control input_box" id="SectionCode" name="SectionCode" placeholder="数値で入力して下さい" value="{{ old('SectionCode') }}">
                    </div>
                    @if ($errors->has('SectionCode'))
                    <div class="text-danger err_m">{{ $errors->first('SectionCode') }}</div>
                    @endif
                
                    <div class="department_name input_wrap">
                        <label for="SectionName" class="form-label label">部門名称</label>
                        <input type="text" class="form-control input_box" id="SectionName"  name="SectionName" placeholder="文字で入力して下さい" value="{{ old('SectionName') }}">
                    </div>
                    @if ($errors->has('SectionName'))
                    <div class="text-danger err_m">{{ $errors->first('SectionName') }}</div>
                    @endif

                    <div class="department_ab_name input_wrap">
                        <label for="SectionAbName" class="form-label label">部門略称</label>
                        <input type="text" class="form-control input_box" id="SectionAbName" name="SectionAbName"  placeholder="文字で入力して下さい" value="{{ old('SectionAbName') }}">
                    </div>
                    @if ($errors->has('SectionAbName'))
                    <div class="text-danger err_m">{{ $errors->first('SectionAbName') }}</div>
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
                                <input class="form-check-input" type="radio" name="PayFor" id="PayFor2"  value="2" checked>
                                <label class="form-check-label ps-2" for="PayFor2">
                                    なし
                                </label>
                            </div>
                        </div>
                    </div>


                    
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
                    
                    <div class="col-12">
                        <div class="form-check input_wrap">
                            <label class="form-check-label label" for="Hidden">非表示</label>
                            <input class="form-check-input" type="checkbox" id="Hidden" name="Hidden" value="1" >
                        </div>
                    </div>

                    
                    <div class="col-12 department_btn">
                        <button type="submit" class="btn btn-primary">確定</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    function checkSubmit(){
        if(window.confirm('送信してよろしいですか？')){
            return true;
        } else {
            return false;
        }
    }
</script>
@endsection
