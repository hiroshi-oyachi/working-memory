@extends('layouts.admin')
@section('title', '登録済みの仕事記録の一覧')

@section('content')
    <div class="container">
        <div class="row">
            <h2>仕事記録の一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ route('schedule.add') }}" role="button" class="btn btn-primary">作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{ route('schedule.index') }}" method="get">
                    <div class="form-group row">
                        <labal class="col-md-2">仕事内容</labal>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_work_detail" value="{{ $cond_work_detail }}">
                        </div>
                        <div class="col-md-2">
                            @csrf
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-schedule col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="15%">日付</th>
                                <th width="45%">仕事内容</th>
                                <th width="15%">開始時間</th>
                                <th width="15%">終了時間</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $schedule)
                            <tr>
                                <td>{{ $schedule->id }}</td>
                                <td>{{ Str::limit($schedule->work_date, 100) }}</td>
                                <td>{{ Str::limit($schedule->work_detail, 250) }}</td>
                                <td>{{ Str::limit($schedule->start_hour, 50) . ":" . Str::limit($schedule->start_minutes, 50) }}</td>
                                <td>{{ Str::limit($schedule->end_hour, 50) . ":" . Str::limit($schedule->end_minutes, 50)}}</td>
                                <td>
                                    <div>
                                        <a href="{{ route('schedule.edit', ['id' => $schedule->id]) }}">編集</a>
                                    </div>
                                    <div>
                                        <a href="{{ route('schedule.delete', ['id' => $schedule->id]) }}">削除</a>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
