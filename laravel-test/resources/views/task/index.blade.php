@extends('layout')

@section('content')    
    <h2>一覧画面</h2>
    <p><a href="{{ route('task.create') }}" class="btn btn-outline-success">新規追加</a></p>
    <p><a href="{{ route('task.index') }}" class="btn btn-outline-success">一覧画面</a></p>

    <form action="/search" method="post">
        @csrf
        <input type="text" name="word" size="40">
        <input type="submit" class="btn btn-primary" value="タスクを検索">
    </form>


    @if ($message = Session::get('success'))
    <h1 class="text-danger">{{ $message }}</h1>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>タイトル</th>
                <th>詳細</th>
                <th>編集</th>
                <th>完了</th>
                <th>削除</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tasks as $task)
                @if ($task->user_id == Auth::id())
                    <tr>
                        <th>{{ $task->subject }}</th>
                        <th><a href="{{ route('task.show',$task->id)}}">詳細</a></th>
                        <th><a href="{{ route('task.edit',$task->id)}}">編集</a></th>
                        <th>
                            @if ($task->completed == 0)
                            完了日時 : {{ $task->complete_date }}
                            @else                    
                            <form action="{{ route('task.update', $task->id)}}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="subject" value="{{ $task->subject }}" class="form-control">
                                <input type="hidden" name="description" value="{{ $task->description }}" class="form-control">                        
                                <input type="hidden" name="completed" value="0">
                                <input type="hidden" name="complete_date" value="{{ \Carbon\Carbon::now()->format("Ymd") }}">
                                <input type="submit" value="完了" class="btn btn-primary">
                            </form>
                            @endif
                        </th>
                        <th>
                            <form action="{{ route('task.destroy', $task->id)}}" method="POST">
                                @csrf
                                @method('DELETE')
                                <input type="submit" value="削除" class="btn btn-danger">
                            </form>
                        </th>
                    </tr>
                @endif
            @endforeach
        </tbody>
    </table>
@endsection
