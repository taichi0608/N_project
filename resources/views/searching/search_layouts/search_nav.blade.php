  <div class="mx-auto" id="search">
   
    <!--検索フォーム-->
    <div class="row">
      <div class="col-sm mb-4">
        <form method="GET" action="{{ route('search.index')}}">
          <div class="form-group row mb-2">
            <label class="col-sm-2 col-form-label">名称</label>
            <!--入力-->
            <div class="col-sm-5">
              <input type="text" class="form-control" name="searchWord" value="{{ $searchWord }}">
            </div>
          </div>     

          <!--プルダウンカテゴリ選択-->
          <div class="form-group row mb-2">
            <label class="col-sm-2">部門検索</label>
            <div class="col-sm-3">
              <select name="categoryId" class="form-control" value="{{ $categoryId }}">
                <option value="">全て選択</option>

                @foreach($categories as $id => $category_name)
                <option value="{{ $id }}">
                  {{ $category_name }}
                </option>  
                @endforeach
              </select>
            </div>
            <div class="col-sm-auto">
              <button type="submit" class="btn btn-primary ">検索</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>


@if(session('err_msg'))
  <p class="text-danger">{{ session('err_msg') }}</p>
@endif
<!--検索結果テーブル 検索された時のみ表示する-->
@if (!empty($products))
  <div class="productTable" id="detail">

      @if(!empty($products->count()))
      <h4>検索結果 :  {{ $products->count() }}  件表示</h4>
      <table class="table table-hover">
          <thead style="background-color: #0d6efd; color:#fff; text-align:center">
            <tr>
                <th>部門コード</th>
                <th>部門名称</th>
                <th>集計部門コード</th>
                <th>集計部門名称</th>
                <th>集計部門略称</th>
                <th>立替区分</th>
                <th>表示順</th>
                <th>非表示設定</th>
                <th></th>
                
            </tr>
          </thead>

          <tbody>
            @foreach($products as $product)
              <tr style="vertical-align:middle; text-align:center">
                <!-- デパートメントテーブル -->
                <td>{{ $product->category->category_code }}</td>
                <td>{{ $product->category->category_name }}</td>
                
                <!-- サマリーテーブル -->
                <td>{{ $product->SummarySectionCode }}</td>
                <td>{{ $product->SummarySectionName }}</td>
                <td>{{ $product->product_ab_name }}</td>
                <td>{{ $product->PayFor }}</td>
                <td>{{ $product->DisplayOrder }}</td>
                <td>{{ $product->Hidden }}</td>
                
                <!-- 編集・削除 -->
                <td><a href="/searching/edit/{{ $product->id }}" class="btn btn-primary btn-sm">編集・削除</a></td>
              </tr>
              @endforeach   
          </tbody>
      </table>
      
      @else
          <h4 style="color:red;">検索結果がありません</h4>
      @endif
  </div>
  <!--テーブルここまで-->

  <!--ページネーション-->
  <div class="d-flex justify-content-center">
      <!-- {{-- appendsでカテゴリを選択したまま遷移 --}} -->
      {{ $products->appends(request()->input())->links() }}
  </div>
  <!--ページネーションここまで-->
@endif

