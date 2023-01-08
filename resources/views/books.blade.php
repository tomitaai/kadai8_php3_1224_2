<x-app-layout>

    <!--ヘッダー[START]-->
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <form action="{{ route('book_index') }}" method="GET" class="w-full max-w-lg">
                <x-button class="bg-gray-100 text-gray-900">{{ __('Dashboard') }}</x-button>
            </form>
        </h2>
    </x-slot>
    <!--ヘッダー[END]-->
            
        <!-- バリデーションエラーの表示に使用-->
       <x-errors id="errors" class="bg-blue-500 rounded-lg">{{$errors}}</x-errors>
        <!-- バリデーションエラーの表示に使用-->
        <!-- 処理結果の表示に使用-->
       <x-alert id="alert" class="bg-blue-500 rounded-lg"></x-alert>
        <!-- 処理結果の表示に使用-->
    <!--全エリア[START]-->
    <div class="flex bg-gray-100">

        <!--左エリア[START]--> 
        <div class="text-gray-700 text-left px-4 py-4 m-2">
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-500 font-bold">
                    おすすめ本の登録
                </div>
            </div>


            <!-- 本のタイトル -->
            <form action="{{ url('books') }}" method="POST" class="w-full max-w-lg">
                @csrf
                  <div class="flex flex-col px-2 py-2">
                   <!-- カラム１ -->
                    <div class="w-full md:w-1/1 px-3 mb-2 md:mb-0">
                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                       書籍名
                      </label>
                      <input name="item_name" class="appearance-none block w-full text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="">
                    </div>
                    <!-- カラム２ -->
                    <div class="w-full md:w-1/1 px-3">
                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        URL
                      </label>
                      <input name="item_url" class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="">
                    </div>
                    <!-- カラム３ -->
                    <div class="w-full md:w-1/1 px-3 mb-2 md:mb-0">
                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        分類
                      </label>
                      
                      
                      <select multiple="1" size="5" name="item_kind">
                        <option value="" selected="selected">選択してください...</option>
                        <option value="プログラミング">プログラミング</option>
                        <option value="ビジネス書">ビジネス書</option>
                        <option value="絵本">絵本</option>
                        <option value="小説">小説</option>
                        <option value="その他">その他</option>
                      </select>

<!--<select name="places[]" size="5" multiple>    -->
<!--  <option value="1">Manhattan</option>-->
<!--  <option value="2">Brooklyn</option>-->
<!--  <option value="3">Queens</option>-->
<!--  <option value="4">Bronx</option>-->
<!--  <option value="5">Staten Island</option>-->
<!--</select> -->
                    <!--</form>-->




                      <!--<input name="item_kind" class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="">-->
                    </div>
                    <!-- カラム４ -->
                    <div class="w-full md:w-1/1 px-3 mb-6 md:mb-0">
                      <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
                        読了日
                      </label>
                      <input name="finished" type="date" class="appearance-none block w-full text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="">
                    </div>
                  </div>
                  <!-- カラム５ -->
                  <div class="flex flex-col">
                      <div class="text-gray-700 text-center px-4 py-2 m-2">
                             <x-button class="bg-blue-500 rounded-lg">送信</x-button>
                      </div>
                   </div>
            </form>
        </div>
        <!--左エリア[END]--> 
    
    
    <!--右側エリア[START]-->
    <div class="flex-1 text-left px-4 py-4 m-2">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="p-6 bg-white border-b border-gray-500 font-bold text-red">
                おすすめ本の一覧
            </div>
        </div>

         <!-- 現在の本 -->
        <table class="table table-fixed px-4 py-4 m-2">

        <tr>
            <th scope="col">読了日</th>
            <th scope="col">書籍名</th>
            <th scope="col">分類</th>
            <th scope="col"></th>
        </tr>
        @if (count($books) > 0)
            @foreach ($books as $book)
                <x-collection url="{{ $book->item_url }}" id="{{ $book->id }}" date="{{ $book->finished }}" kind="{{ $book->item_kind }}">{{ $book->item_name }}</x-collection>
            @endforeach
        @endif
            </table>

        <!--</div>-->
        <div>
                {{ $books->links()}}
        </div>
    </div>

    <!--右側エリア[[END]-->  


</div>
 <!--全エリア[END]-->

</x-app-layout>