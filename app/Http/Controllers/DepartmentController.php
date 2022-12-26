<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DepartmentRequest;
use App\Models\Department;

class DepartmentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * 一覧表示 
     * 
     * @return view
     */
    public function list()
    {
        $inputs = Department::all();
        return view('department.list',['inputs' => $inputs]);
    }

     /**
     * 詳細表示 
     * 
     * @param int $id
     * @return view
     */
    public function detail($id)
    {
        $input = Department::find($id);
        if(is_null($input)){
            \Session::flash('err_msg' , 'データがありません。');
            return redirect( route('list') );
        }
        return view('department.detail',['input' => $input]);
    }

    /**
     * 登録画面を表示する 
     * 
     * @return view
     */
    public function create()
    {
        return view('department.create');
    }

    /**
     * 登録する 
     * 
     * @return view
     */
    public function store(DepartmentRequest $request)
    {
        // データを受け取る
        $inputs = $request->all();
        \DB::beginTransaction();
        // dd($inputs);
   
        try{
            // データを登録
            Department::create($inputs);
            \DB::commit();
        }catch(\Throwable $e){
            \DB::rollback();
            abort(500);
        }
        \Session::flash('err_msg' , '登録しました。');
        return redirect( route('list') );
    }

     /**
     * 編集画面表示 
     * 
     * @param int $id
     * @return view
     */
    public function edit($id)
    {
        $input = Department::find($id);
        if(is_null($input)){
            \Session::flash('err_msg' , 'データがありません。');
            return redirect( route('list') );
        }
        return view('department.edit',['input' => $input]);
    }

    /**
     * 更新する 
     * 
     * @return view
     */
    public function update(DepartmentRequest $request)
    {
        // データを受け取る
        $input = $request->all();
        \DB::beginTransaction();
 
        try{
            // データを更新
            Department::where('id', $input['id'])->update([
                // 'TenantCode' => $input['TenantBranch'],
                'SectionCode' => $input['SectionCode'],
                'SectionName' => $input['SectionName'],
                'SectionAbName' => $input['SectionAbName'],
                'PayFor' => $input['PayFor'],
                'Hidden' => $input['Hidden'],
                'DisplayOrder' => $input['DisplayOrder'],
                // 'UpdatePerson' => $input['UpdatePerson']
            ]);
            \DB::commit();
        }catch(\Throwable $e){
            \DB::rollback();
            abort(500);
        }
        \Session::flash('err_msg' , '更新しました。');
        return redirect( route('list') );
    }

    /**
     * 削除する 
     * @param int $id
     * @return view
     */
    public function delete(Request $request)
    {
        $inputs = $request->all();
        Department::where('id', $inputs['id'])->delete();
        \Session::flash('err_msg' , '削除しました。');
        return redirect( route('list') );
    }


}
