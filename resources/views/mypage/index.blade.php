@extends('layouts.admin')
@section('title', 'マイページ')

@section('content')
    <div class='container'>
        <div class='row'>
            <h2>マイページ</h2>
        </div>
        <div class="row">
            <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                仕事記録
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="{{ route('schedule.add') }}">新規作成</a></li>
                <li><a class="dropdown-item" href="{{ route('schedule.index') }}">編集・一覧</a></li>
              </ul>
            </div>
        </div>
        <div class="row">
            <div class="dropdown">
              <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                収支記録
              </button>
              <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li><a class="dropdown-item" href="{{ route('balance.add') }}">新規作成</a></li>
                <li><a class="dropdown-item" href="{{ route('balance.index') }}">編集・一覧</a></li>
                <li><a class="dropdown-item" href="{{ route('balance.graph') }}">収支表</a></li>
              </ul>
            </div>
        </div>
    </div>
@endsection
