@extends('layouts.app')

@section('content')
<div class="container">
    <h2>詳細表示</h2>
    <nav class="department_nav_list">
        <p class="department_nav_item"><a href="{{ route('list') }}">一覧表示</a></p>
        <p class="department_nav_item"><a href="{{ route('create') }}">新規登録</a></p>
        <p class="department_nav_item"><a href="/department/edit/{{ $input['id'] }}">変更</a></p>
        <form method="POST" action="{{ route('delete', $input['id']) }}" onSubmit="return checkDelete()">
            @csrf
            <button type="submit" class="department_nav_item" onclick="">削除</button>
        </form>
        <p class="department_nav_item"><a href="">コピー</a></p>
        <p class="department_nav_item"><a href="">貼り付け</a></p>
        <p class="department_nav_item"><a href="">出力</a></p>
    </nav>
    <div class="">
        <div class="">
            <div class="">
                <form method="POST" action="{{ route('store') }}" onSubmit="return checkSubmit()">
                    @csrf
                    <div class="department_cd input_wrap">
                        <label for="SectionCode" class="form-label label">部門CD</label>
                        <input type="text" class="form-control input_box" id="SectionCode" name="SectionCode"  value="{{ $input['SectionCode'] }}" disabled>
                    </div>
                    <div class="department_name input_wrap">
                        <label for="SectionName" class="form-label label">部門名称</label>
                        <input type="text" class="form-control input_box" id="SectionName"  name="SectionName" value="{{ $input['SectionName'] }}" disabled>
                    </div>
                    <div class="department_ab_name input_wrap">
                        <label for="SectionAbName" class="form-label label">部門略称</label>
                        <input type="text" class="form-control input_box" id="SectionAbName" name="SectionAbName"  value="{{ $input['SectionAbName'] }}" disabled>
                    </div>
                    <div class="department_payfor input_wrap">
                        <label for="PayFor" class="form-label label">立替区分</label>
                        <input type="text" class="form-control input_box" id="PayFor"  name="PayFor"  value="{{ $input['PayFor'] }}" disabled>
                    </div>
                    
                    <div class="input_wrap">
                        <label for="DisplayOrder" class="form-label label">表示順</label>
                        <input type="text" class="form-control input_box" id="DisplayOrder"  name="DisplayOrder"  value="{{ $input['DisplayOrder'] }}" disabled>
                    </div>
                    
                    <div class="col-12">
                        <div class="form-check input_wrap">
                            <label class="form-check-label label" for="Hidden">非表示</label>
                            <input class="form-check-input" type="checkbox" id="Hidden" disabled>
                        </div>
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
    function checkDelete(){
        if(window.confirm('削除してよろしいですか？')){
            return true;
        } else {
            return false;
        }
    }
</script>
@endsection
