<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SummarySectiontRequest;
use App\Models\SummarySection;

class SummarySectionController extends Controller
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
    public function s_list()
    {
        $inputs = SummarySection::all();
        return view('summary_sections.list',['inputs' => $inputs]);
    }

     /**
     * 詳細表示 
     * 
     * @param int $id
     * @return view
     */
    public function s_detail($id)
    {
        $input = SummarySection::find($id);
        if(is_null($input)){
            \Session::flash('err_msg' , 'データがありません。');
            return redirect( route('home') );
        }
        return view('summary_sections.detail',['input' => $input]);
    }

    /**
     * 登録画面を表示する 
     * 
     * @return view
     */
    public function s_create()
    {
        return view('summary_sections.create');
    }

    /**
     * 登録する 
     * 
     * @return view
     */
    public function s_store(SummarySectionRequest $request)
    {
        // データを受け取る
        $inputs = $request->all();
        \DB::beginTransaction();
        // dd($inputs);
   
        try{
            // データを登録
            SummarySection::create($inputs);
            \DB::commit();
        }catch(\Throwable $e){
            \DB::rollback();
            abort(500);
        }
        \Session::flash('err_msg' , '登録しました。');
        return redirect( route('create') );
    }

     /**
     * 編集画面表示 
     * 
     * @param int $id
     * @return view
     */
    public function s_edit($id)
    {
        $input = SummarySection::find($id);
        if(is_null($input)){
            \Session::flash('err_msg' , 'データがありません。');
            return redirect( route('home') );
        }
        return view('summary_sections.edit',['input' => $input]);
    }

    /**
     * 更新する 
     * 
     * @return view
     */
    public function s_update(SummarySectionRequest $request)
    {
        // データを受け取る
        $input = $request->all();
        \DB::beginTransaction();
    //   dd($input);
        try{
            // データを更新
            SummarySection::where('id', $input['id'])->update([
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
        return redirect( route('home') );
    }


    /**
     * 削除する 
     * @param int $id
     * @return view
     */
    public function s_delete($id)
    {
        // dd($id);
        // データを受け取る
        if(empty($id)){
            \Session::flash('err_msg' , 'データがありません。');
            return redirect( route('home') );
        }
        
        try{
            SummarySection::destroy($id);
        }catch(\Throwable $e){ 
            abort(500);
        }
        \Session::flash('err_msg' , '削除しました。');
        return redirect( route('home') );
    }
}
