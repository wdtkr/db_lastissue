<!-- resources/views/todocontents.blade.php -->
@extends('layouts.app')
@section('content')

    <!-- Bootstrapの定形コード… -->
    <div class="card-body">
        <div class="card-title">
            <h2>
            タスク追加
            </h2>
        </div>
        
        <!-- バリデーションエラーの表示に使用-->
        @include('common.errors')
        <!-- バリデーションエラーの表示に使用-->

        <!-- 登録フォーム -->
        <form action="{{ url('todocontents') }}" method="POST" class="form-horizontal">
            @csrf

            <!-- タスク -->
            <div class="form-group">
                <div class="form-row">
                    <div class="col-sm-6">
                        <label for="title">タスク名<span class="badge badge-danger ml-2">{{ __('必須') }}</span></label>
                        <input type="text" name="title" class="form-control" required>
                    </div>
                    <div class="col-sm-6">
                        <label for="title">期限<span class="badge badge-danger ml-2">{{ __('必須') }}</span></label>
                        <input type="datetime-local" name="deadline" class="form-control" value="2022-07-17T12:00" required>
                    </div>
                </div>
                <br>
                
                <br>
                <label for="content">タスク詳細</label>
                <textarea name="content" class="form-control">
                </textarea>
            </div>

            <!-- 登録ボタン -->
            <br>
            <div class="form-group">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-primary">
                        登録
                    </button>
                </div>
            </div>
        </form>
    </div>
    @if(session('message'))
        <div class="alert alert-success">
            {{session('message')}}
        </div>
    @endif
    
    <!-- ToDoContents: 既に登録されてるタスクのリスト -->
    @if(count($todocontents) > 0)
        <div class="card-body">
            <div class="card-body">
                <table class="table table-striped task-table">
                    <!--　テーブルのヘッダー -->
                    <thead>
                        <th>タスク一覧</th>
                        <th>&nbsp;</th>
                    </thead>
                    <!-- テーブル本体-->
                    <tbody>
                        @foreach($todocontents as $task)
                        <tr>
                            <!--　タスクタイトル-->
                            <td class="table-text">
                                <div><h1>{{ $task -> title}}</h1></div>
                                <div>
                                {{ $task -> content}}
                                【期限】{{$task -> deadline}}
                                </div>
                                <!--　tableの中身を取り出しtaskに入れ、taskの要素を取り出してる　-->

                            </td>
                            
                            <td>
                                <form action="{{ url('todocontentsedit/'.$task->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">
                                        編集
                                    </button>
                                </form>
                            </td>
                            
                             <!--削除ボタン-->
                            <td>
                                <form action="{{ url('todocontent/'.$task->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger">
                                        削除
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4 offset-md-4">
                {{$todocontents->links()}}
            </div>
        </div>
    @else
     <div class="card-body">
        <div class="card-body">
            <table class="table table-striped task-table">
                <thead>
                    <th>タスク一覧</th>
                    <th>&nbsp;</th>
                </thead>
                    <!-- テーブル本体-->
                <tbody>
                    <tr>
                    <!--　タスクタイトル-->
                        <td class="table-text">
                            <div><h1>タスクがありません</h1></div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    @endif

@endsection