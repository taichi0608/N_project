<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\M_SummarySectionRequest;
use App\Models\M_SummarySection;
use App\Models\M_Section;
use DB;

class ProductController extends Controller
{
// 一覧表示ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー

    /*==================================
    検索フォームのみ表示(show)
    ==================================*/
    public function show(Request $request)
    {
        //フォームを機能させるために各情報を取得し、viewに返す

        // モデルでワードとIDでピックアップした項目を全て読み込む
        $category = new M_Section;
        
        $categories = $category->getLists();

        // カテゴリー名称で検索欄で検索をかけたときの処理
        $searchWord = $request->input('searchWord');
        
        // IDで検索欄で検索をかけたときの処理
        $categoryId = $request->input('categoryId');
       

        // View に渡す
        return view('/searching/index', [
            'categories' => $categories,
            'searchWord' => $searchWord,
            'categoryId' => $categoryId
        ]);
    }

    
    /*==================================
    検索メソッド(searchproduct)
    ==================================*/
    public function search(Request $request)
    {
        //入力される値nameの中身を定義する
        $searchWord = $request->input('searchWord'); //商品名の値
        $categoryId = $request->input('categoryId'); //カテゴリの値

        $query = M_SummarySection::query();

      
        // 入力欄に商品名が入力された場合、productsテーブルから一致する商品を$queryに代入
        if (isset($searchWord)) {
            $query->where('SummarySectionName', 'like', '%' . self::escapeLike($searchWord) . '%');
        }
        // カテゴリが選択された場合、categoriesテーブルからcategory_idが一致する商品を$queryに代入
        if (isset($categoryId)) {
            $query->where('category_id', $categoryId);
        }

        // $queryをcategory_idの昇順に並び替えて$productsに代入
        $products = $query->orderBy('category_id', 'asc')->orderBy('SummarySectionCode', 'asc')->paginate(10);
        // dd($products);

        // categoriesテーブルからgetLists();関数でcategory_nameとidを取得する
        $category = new M_Section;
        $categories = $category->getLists();

        return view('/searching/index', [
            'products' => $products,
            'categories' => $categories,
            'searchWord' => $searchWord,
            'categoryId' => $categoryId,
        ]);
    }

    //「\\」「%」「_」などの記号を文字としてエスケープさせる
    public static function escapeLike($str)
    {
        return str_replace(['\\', '%', '_'], ['\\\\', '\%', '\_'], $str);
    }

// 一覧表示ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー



// 新規作成フォーム表示ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
    /**
     * データを受け取る 
     * @return view
     */
    public function create()
    {
    $categories = DB::table('categories')->get();

    return view( '/searching/create' ,compact('categories') );
    }
    /**
     * 登録する 
     * 
     * @return view
     */
    public function store(M_SummarySectionRequest $request)
    {
        $inputs = $request->all();

        //集計部門コード（ユニークキー）が存在しているかチェック
        if (M_SummarySection::where('SummarySectionCode', $inputs['SummarySectionCode'])->exists() === false){

            \DB::beginTransaction();
            try{
                M_SummarySection::create($inputs);
                \DB::commit();
            }catch(\Throwable $e){
                \DB::rollback();
                abort(500);
            }
            \Session::flash('err_msg' , '登録しました。');
            return redirect( route('search.index') );

        }else{
            \Session::flash('err_msg' , '既にデータが存在しています。');
            return redirect( route('search.index') );
        }

        
    }
// 新規作成フォーム表示ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー






// 変更・削除フォーム表示ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー

    /**
     * 変更・削除画面を表示する 
     * @param int $id
     * @return view
     */
    public function edit($id)
    {
        $input = M_SummarySection::find($id);
        // 楽観ロック
        $before_time = M_SummarySection::where('id',$input['id'])->sum('updated_at'); //①編集画面からUpdated_atを取得し文字列に変換してedit.bladeに渡す（ リストの編集を押すまでのデータ ）

        if(is_null($input)){
            \Session::flash('err_msg','選択されたデータはありませんでした。');
            return redirect(route('search.index'));
        }
        return view('/searching/edit',compact('input','before_time'));
    }

     /**
     * 変更する 
     * 
     * @return view
     */
    public function update(M_SummarySectionRequest $request)
    {
        // データを受け取る
        $inputs = $request->all();
        // 楽観ロックのロジック ①と②で差があればリダイレクトさせる
        $before_time = $inputs['updated_at']; //①編集画面からUpdated_atを取得（ リストの編集を押すまでのデータ ）
        $after_time = M_SummarySection::where('id',$inputs['id'])->sum('updated_at'); //②現在のデータベースからUpdated_atを取得（ 変更するボタンを押した時のデータ ）
        
        if($before_time !== $after_time){
            return redirect()->route('search.index')
            ->with(\Session::flash('err_msg' , '直近で変更されています。再度確認してください。'));  
        }else{
            \DB::beginTransaction();
            try{
                // データを登録
                $input = M_SummarySection::find($inputs['id']);
                \DB::commit();
                $input->fill([
                    'SummarySectionName' => $inputs['SummarySectionName'],
                    'SummarySectionCode' => $inputs['SummarySectionCode'],
                    'product_ab_name' => $inputs['product_ab_name'],
                    'DisplayOrder' => $inputs['DisplayOrder'],
                    'PayFor' => $inputs['PayFor'],
                    'Hidden' => $inputs['Hidden'],
                ]);
                
                $input->update();
           
            }catch(\Throwable $e){
                \DB::rollback();
                abort(500);
            }
            \Session::flash('err_msg' , '変更しました。');
            return redirect( route('search.index') );
        }
        
    }

     /**
     * 削除する 
     * 
     * @return view
     */
   
    public function destroy(Request $request)
    {
        $inputs = $request->all();

        //デリート時にデータベースに値がない場合の分岐処理
        if (M_SummarySection::where('id', $inputs['id'])->exists() !== false){
          
            \DB::beginTransaction();
            try{
                M_SummarySection::where('id', $inputs['id'])->delete();
                \DB::commit();     
            }catch(\Throwable $e){
                \DB::rollback();
                abort(500);
            }

            \Session::flash('err_msg' , '削除しました。');
            return redirect( route('search.index') );

        }else{
            \Session::flash('err_msg' , 'データが存在しません。');
            return redirect( route('search.index') );
        }

    }

   
// 変更・削除フォーム表示ーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーーー
    


}