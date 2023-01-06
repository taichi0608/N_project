<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DepartmentRequest;
use App\Models\Department;
use App\Models\Category;
use DB;

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
    public function list(Request $request)
    {
        // ソートボタンを押下したら
        $inputs = Category::all();
        $sort = $request->get('sort');
     
        if ($sort) {
            // 表示順 > 部門コード順_ASC
            if ($sort === '1') {
                $inputs = Category::orderBy('displayOrder', 'ASC')->orderBy('category_code', 'ASC')->get();
            }else if($sort === '2') {
                $inputs = Category::orderBy('displayOrder', 'DESC')->orderBy('category_code', 'ASC')->get();
            // 部門コード順
            }elseif ($sort === '3') {
                $inputs = Category::orderBy('category_code', 'DESC')->get();
            }elseif ($sort === '4') {
                $inputs = Category::orderBy('category_code', 'ASC')->get();
            // 立替区分 ありorなし > 部門コード順_ASC
            }elseif ($sort === '5') {
                $inputs = Category::orderBy('PayFor', 'ASC')->orderBy('category_code', 'ASC')->get();
            }elseif ($sort === '6') {
                $inputs = Category::orderBy('PayFor', 'DESC')->orderBy('category_code', 'ASC')->get();
            // 立替区分 ありorなし > 部門コード順_ASC
            }elseif ($sort === '7') {
                $inputs = Category::orderBy('Hidden', 'ASC')->orderBy('category_code', 'ASC')->get();
            }elseif ($sort === '8') {
                $inputs = Category::orderBy('Hidden', 'DESC')->orderBy('category_code', 'ASC')->get();
            }
        } else {
            // リンク先からきた場合（ソートボタンを押下してない場合）
            $inputs = Category::orderBy('category_code', 'ASC')->get();
        }


        return view(
            'department.list',
            [
                'inputs' => $inputs,
                'sort' => $sort,
                // 'hidden' => $hidden,
            
            ]
        );

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
        // 楽観ロック
        $before_time = Category::where('id',$input['id'])->sum('updated_at'); //①編集画面からUpdated_atを取得し文字列に変換してedit.bladeに渡す（ リストの編集を押すまでのデータ ）
        if(is_null($input)){
            \Session::flash('err_msg' , 'データがありません。');
            return redirect( route('department.list') );
        }
        return view('department.edit',['input' => $input], compact('before_time'));
    }

    /**
     * 更新する 
     * 
     * @return view
     */
    public function update(DepartmentRequest $request)
    {
        $inputs = $request->all();
        
        // 楽観ロックのロジック ①と②で差があればリダイレクトさせる
        $before_time = $inputs['updated_at']; //①編集画面からUpdated_atを取得（ リストの編集を押すまでのデータ ）
        $after_time = Category::where('id',$inputs['id'])->sum('updated_at'); //②現在のデータベースからUpdated_atを取得（ 変更するボタンを押した時のデータ ）

        if($before_time !== $after_time){
            return redirect()->route('department.list')
            ->with(\Session::flash('err_msg' , '直近で変更されています。再度確認してください。'));  
        }else{
            DB::beginTransaction();
            try{
                $input = Category::find($inputs['id']);
                // dd($inputs['PayFor']);
                $input->fill([
                    'category_code' => $inputs['category_code'],
                    'category_name' => $inputs['category_name'],
                    'category_ab_name' => $inputs['category_ab_name'],
                    'DisplayOrder' => $inputs['DisplayOrder'],
                    'PayFor' => $inputs['PayFor'],
                    'Hidden' => $inputs['Hidden'],
                ]);
                DB::commit();
                $input->update();
            }catch(\Throwable $e){
                DB::rollback();
                abort(500);
            }
            \Session::flash('err_msg' , '更新しました。');
            return redirect( route('department.list') );
        }
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
        \Session::flash('err_msg' , '削除をしました。');
        return redirect( route('department.list') );
    }


}
