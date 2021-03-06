@extends('layouts.app')

@section('content')
    <!-- Bootstrapの定形コード… -->

    <div class='container'>
        <div class="panel-body">
            <!-- バリデーションエラーの表示 -->
            @include('common.errors')

            <!-- 新タスクフォーム -->
            <form action="/task" method="POST" class="form-horizontal">
                {{ csrf_field() }}

                <!-- タスク名 -->
                <div class="form-group">
                    <label for="task-name" class="col-sm-3 control-label">Task</label>

                    <div class="col-sm-6">
                        <input type="text" name="name" id="task-name" class="form-control">
                    </div>
                </div>

                <!-- タスク追加ボタン -->
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-6">
                        <button type="submit" class="btn btn-success">
                            Add Task
                        </button>
                    </div>
                </div>
            </form>
        </div>
        <!-- 現在のタスク -->
        @if (count($tasks) > 0)
            <div class="panel panel-default">
                <div class="panel-heading">
                    現在のタスク
                </div>

                <div class="panel-body">
                    <table class="table table-striped task-table">

                        <!-- テーブルヘッダー -->
                        <thead>
                            <th>Task</th>
                            <th>&nbsp;</th>
                        </thead>

                        <!-- テーブルボディー -->
                        <tbody>
                            @foreach ($tasks as $task)
                                <tr>
                                    <!-- タスク名 -->
                                    <td class="table-text">
                                        <div>{{ $task->name }}</div>
                                    </td>

                                    <!-- 削除ボタン -->
                                    <td>
                                        <form action="/task/{{ $task->id }}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button class="btn btn-danger">タスク削除</>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
@endsection