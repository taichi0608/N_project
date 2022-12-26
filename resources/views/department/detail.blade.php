@extends('department.department_layouts.layout')
@section('department.department_layouts.layout.title', '部門マスタ：詳細表示')

@section('department.content')

<div class="container">
  <h2>詳細表示</h2>
    <div class="change_nav">
        @include('department.department_layouts.page_nav')<!-- 新規作成などのページ遷移ナビゲーションを継承 -->
    </div>
    <div class="wrap">
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

@endsection
