<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Auth;
use Validator;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::where('user_id',Auth::user()->id)->orderBy('created_at', 'asc')->paginate(5);
        return view('books', [
            'books' => $books
        ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //バリデーション
        $validator = Validator::make($request->all(), [
         'item_name' => 'required|min:3|max:255',
         'item_url' => 'required',
         'item_kind' => 'required',
         'finished'   => 'required'
        ]);

        //バリデーション:エラー 
        if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
        }
        //以下に登録処理を記述（Eloquentモデル）

        // Eloquentモデル
        $books = new Book;
        $books->user_id  = Auth::user()->id; //追加のコード
        $books->item_name = $request->item_name;
        $books->item_url = $request->item_url;
        $books->item_kind = $request->item_kind;
        $books->finished = $request->finished;
        $books->save(); 
        
        return redirect('/') ->with('status', '登録しました。');  //追加
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function show(Book $book)
    {
        //
        $books = Book::where('user_id',Auth::user()->id)->find($book_id);
        return view('booksshow', ['book' => $books]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function edit($book_id)
    {
        //
        //更新画面
        $books = Book::where('user_id',Auth::user()->id)->find($book_id);
        return view('booksedit', ['book' => $books]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Book $book)
    {
        //
        //バリデーション
         $validator = Validator::make($request->all(), [
             
             'id' => 'required',
             'item_name' => 'required|min:3|max:255',
             'item_url' => 'required',
             'item_kind' => 'required',
             'finished' => 'required'
        ]);
        //バリデーション:エラー
         if ($validator->fails()) {
             return redirect('/booksedit/'.$request->id)
                 ->withInput()
                 ->withErrors($validator);
        }
        
        //データ更新
        
        $books = Book::where('user_id',Auth::user()->id)->find($request->id);
        // $books = Book::find($request->id);　　たぶん不要
        $books->item_name   = $request->item_name;
        $books->item_url = $request->item_url;
        $books->item_kind = $request->item_kind;
        $books->finished = $request->finished;
        $books->save();
        return redirect('/') ->with('status', '更新しました。');  //追加
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Book  $book
     * @return \Illuminate\Http\Response
     */
    public function destroy(Book $book)
    {
        //
        $book->delete();       //追加
        return redirect('/') ->with('status', '削除しました。');  //追加
    }
    
    public function __construct()
    {
        //
        $this->middleware('auth');
    }
}
