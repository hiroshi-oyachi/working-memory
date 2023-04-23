@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <a href="/schedule" class="btn">仕事記録</a>
                    <a href="/balance" class="btn">収支記録</a>
                    <a href="/mypage" class="btn">マイページ</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
