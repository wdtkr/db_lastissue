<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Todocontent;
use Validator;
use Auth;
use Session;

class TodocontentsController extends Controller{
    
    // コンストラクタ
    public function __construct(){
        $this->middleware('auth');
    }
    
    // home画面
    public function index(){
        $todocontents = Todocontent::where('user_id',Auth::user()->id)
        ->orderBy('deadline','asc')
        ->paginate(7);
        return view('todocontents',[
            'todocontents' => $todocontents
        ]);
    }
    
    // 更新画面
    public function edit($todocontent_id){
        $todocontents = Todocontent::where('user_id',Auth::user()->id)->find($todocontent_id);
        return view('todocontentsedit',[
            'task' => $todocontents
            ]);
    }
    
    // 更新処理
    public function update(Request $request){
        // requestには、前のページから送られてきた情報が入る
        // バリデーション
        $validator = Validator::make($request->all(),[
            'id' => 'required',
            'title' => 'required|max:50',
            'content' => 'max:255',
            'deadline' => 'required'
        ]);
        
        // バリデーションエラー
        if($validator->fails()){
            return redirect('/')
                // ->route('/todocontentsedit/', [$request])
                ->withInput()
                ->withErrors($validator);
        }
    
        // 初期値を持ってくる
        $todocontents = Todocontent::where('user_id',Auth::user()->id)->find($request->id);
        $todocontents ->title = $request -> title;
        $todocontents -> deadline = $request -> deadline;
        $todocontents -> content = $request -> content;
        $todocontents->save();
        return redirect('/');
    }
    
    // ToDo追加処理
    public function store(Request $request){
        // リクエスト確認
        // dd($request);
           
        // バリデーション
        $validator = Validator::make($request->all(),[
            'title' => 'required|max:50',
            'content' => 'max:255',
            'deadline' => 'required'
        ]);
    
        // バリデーションエラー
        if($validator->fails()){
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }
            
        //Eloquentモデル（登録処理）
        $todocontents = new Todocontent;
        $todocontents ->user_id = Auth::user() -> id;
        $todocontents -> title = $request -> title;
        $todocontents -> deadline = $request -> deadline;
        $todocontents -> content = $request -> content;
        $todocontents -> save();
        return redirect('/')->with('message','タスクの登録が完了しました');
    }
    
    // 削除処理
    public function destroy(Todocontent $task){
        $task -> delete();
        return redirect('/');
    }
}
