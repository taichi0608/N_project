@extends('layouts.app')

@section('content')
<div class="container">
    <h2>編集画面</h2>
    <nav class="department_nav_list">
        <p class="department_nav_item"><a href="{{ route('list') }}">一覧表示</a></p>
        <p class="department_nav_item"><a href="{{ route('create') }}">新規登録</a></p>
        <form method="POST" action="{{ route('delete', $input['id']) }}" onSubmit="return checkDelete()">
            @csrf
            <button type="submit" class="department_nav_item" onclick="">削除</button>
        </form>
    </nav>

    <div class="">
        <div class="">
            <div class="">
                <form method="POST" action="{{ route('update') }}" onSubmit="return checkSubmit()">
                    @csrf
                    <!-- id受け取り -->
                    <input type="hidden" name="id" value="{{ $input['id'] }}"> 
                    <div class="department_cd input_wrap">
                        <label for="SectionCode" class="form-label label">部門CD</label>
                        <input type="text" class="form-control input_box" id="SectionCode" name="SectionCode"  value="{{ $input['SectionCode'] }}">
                    </div>
                    @if ($errors->has('SectionCode'))
                    <div class="text-danger err_m">{{ $errors->first('SectionCode') }}</div>
                    @endif

                    <div class="department_name input_wrap">
                        <label for="SectionName" class="form-label label">部門名称</label>
                        <input type="text" class="form-control input_box" id="SectionName"  name="SectionName" value="{{ $input['SectionName'] }}">
                    </div>
                    @if ($errors->has('SectionName'))
                    <div class="text-danger err_m">{{ $errors->first('SectionName') }}</div>
                    @endif

                    <div class="department_ab_name input_wrap">
                        <label for="SectionAbName" class="form-label label">部門略称</label>
                        <input type="text" class="form-control input_box" id="SectionAbName" name="SectionAbName"  value="{{ $input['SectionAbName'] }}">
                    </div>
                    @if ($errors->has('SectionAbName'))
                    <div class="text-danger err_m">{{ $errors->first('SectionAbName') }}</div>
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


                    <div class="col-12 department_btn">
                        <button type="submit" class="btn btn-primary">変更</button>
                    </div>
                    <!-- 削除ボタン -->
                </form>
               
            </div>
        </div>
    </div>
</div>
<script>
    function checkSubmit(){
        if(window.confirm('変更してよろしいですか？')){
            return true;
        } else {
            return false;
        }
    }
    function checkDelete(){
        if(window.confirm('削除してよろしいですか？')){
            return true;
        } else {
            return false;
        }
    }
</script>
@endsection
