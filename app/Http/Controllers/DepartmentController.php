<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DepartmentRequest;
use App\Models\Department;
use App\Models\Category;

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
        $inputs = Category::all();
        // $inputs をcategory__codeの昇順に並び替え
        $inputs = Category::orderBy('category_code', 'asc')->get();
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
        $input = Category::find($id);
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
        $inputs = $request->all();
        \DB::beginTransaction();
   
        try{
            Category::create($inputs);
            \DB::commit();
        }catch(\Throwable $e){
            \DB::rollback();
            abort(500);
        }
        \Session::flash('err_msg' , '登録しました。');
        return redirect( route('department.list') );
    }

     /**
     * 編集画面表示 
     * 
     * @param int $id
     * @return view
     */
    public function edit($id)
    {
        $input = Category::find($id);
        if(is_null($input)){
            \Session::flash('err_msg' , 'データがありません。');
            return redirect( route('department.list') );
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
        $inputs = $request->all();
        \DB::beginTransaction();
        try{
            $input = Category::find($inputs['id']);
            \DB::commit();
            $input->fill([
                'category_code' => $inputs['category_code'],
                'category_name' => $inputs['category_name'],
                'category_ab_name' => $inputs['category_ab_name'],
                'DisplayOrder' => $inputs['DisplayOrder'],
                'PayFor' => $inputs['PayFor'],
                'Hidden' => $inputs['Hidden'],
            ]);
            $input->save();
        }catch(\Throwable $e){
            \DB::rollback();
            abort(500);
        }
        \Session::flash('err_msg' , '更新しました。');
        return redirect( route('department.list') );
    }

    /**
     * 削除する 
     * @param int $id
     * @return view
     */
    public function delete(Request $request)
    {
        $inputs = $request->all();
        $deleted_child = Category::where('id', $request->id)->first();
        \DB::beginTransaction();
        try{
            $deleted_child->delete(); // このタイミングでcommentも一緒に削除されます。
            Category::where('id', $inputs['id'])->delete();
            \DB::commit();     
        }catch(\Throwable $e){
            \DB::rollback();
            abort(500);
        }
        \Session::flash('err_msg' , '登録しました。');
        return redirect( route('search.index') );
    }


}
