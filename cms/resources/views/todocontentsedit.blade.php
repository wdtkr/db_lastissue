@extends('layouts.app')

@section('content')
<div class="row container">
    <div class="col-md-12">
    <div class="card-title">
        <h2>
        タスクの編集
        </h2>
    </div>
    @include('common.errors')
    <form action="{{ url('todocontents/update') }}" method="POST">

        <div class="form-group">
           <label for="title">タスク名</label>
           <input type="text" name="title" class="form-control" value="{{$task->title}}" required>
        </div>

        <div class="form-group">
           <label for="deadline">期限</label>
        <input type="datetime" name="deadline" class="form-control" value="{{$task->deadline}}" required>
        </div>

        <div class="form-group">
           <label for="content">タスク詳細</label>
        <textarea name="content" class="form-control" value="{{$task->content}}">{{$task->content}}</textarea>

        </div>
        
        <!-- Saveボタン/Backボタン -->
        <div class="well well-sm">
            <button type="submit" class="btn btn-primary">保存</button>
            <a class="btn btn-link pull-right" href="{{ url('/') }}">
                戻る
            </a>
        </div>
        <!--/ Saveボタン/Backボタン -->
         
         <!-- id値を送信 -->
         <input type="hidden" name="id" value="{{$task->id}}">
         <!--/ id値を送信 -->
         
         <!-- CSRF -->
         @csrf
         <!--/ CSRF -->
         
    </form>
    </div>
</div>
@endsection
