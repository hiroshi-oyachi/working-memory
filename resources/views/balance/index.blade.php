@extends('layouts.admin')
@section('title', '登録済みの収支記録の一覧')

@section('content')
    <div class='container'>
        <div class='row'>
            <h2>収支記録の一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-4">
                <a href="{{ route('balance.add') }}" role="button" class="btn btn-primary">作成</a>
            </div>
            <div class="col-md-8">
                <form action="{{ route('balance.index') }}" method="get">
                    <div class="form-group row">
                        <label class="col-me-2">年か月</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_year" value="{{ $cond_year }}">
                        </div>
                        <div class="form-group row">
                            <label class="col-me-2">種別</label>
                        </div>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_balance_type" value="{{ $cond_balance_type }}">
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
            <div class="list-balance col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="15%">日付</th>
                                <th width="45%">収支内容</th>
                                <th width="20%">金額</th>
                                <th width="15%">種別</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $balance)
                            <tr>
                                <td>{{ $balance->id}}</td>
                                <td>{{ Str::limit($balance->year, 50) . "/" . Str::limit($balance->month, 50) }}</td>
                                <td>{{ Str::limit($balance->detail, 250) }}</td>
                                <td>{{ Str::limit($balance->price, 150) }}</td>
                                <td>{{ Str::limit($balance->balance_type, 100) }}</td>
                                <td>
                                    <div>
                                        <a href="{{ route('balance.edit', ['id' => $balance->id]) }}">編集</a>
                                    </div>
                                    <div>
                                        <a href="{{ route('balance.delete', ['id' => $balance->id]) }}">削除</a>
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
