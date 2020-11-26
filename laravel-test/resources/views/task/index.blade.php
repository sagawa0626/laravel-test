@extends('layout')

@section('content')
    <h2>一覧画面</h2>
    <p><a href="{{ route('task.create') }}" class="btn btn-outline-success">新規追加</a></p>

    @if ($message = Session::get('success'))
    <p>{{ $message }}</p>
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
    </table>