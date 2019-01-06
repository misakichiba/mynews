@extends('layouts.profile')
@section('title', 'プロフィール')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロフィール作成</h2>
                <form action="{{ action('Admin\ProfileController@update') }}" method="post" enctype="multipart/form-data">

                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <ul>
                    <li class="form-group row">
                        <label class="col-md-2" for="name">氏名(name)</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="name" value="{{ old('name') }}" >
                        </div>
                    </li>
                    <li class="form-group row">
                        <label class="col-md-2" for="gender">性別(gender)</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="gender" value="{{ old('gender') }}">
                        </div>
                    </li>
                    <li class="form-group row">
                        <label class="col-md-2" for="hobby">趣味(hobby)</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="hobby" rows="5">{{ old('hobby') }}</textarea>
                        </div>
                    </li>
                    <li class="form-group row">
                        <label class="col-md-2" for="introduction">自己紹介欄(introduction)</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="introduction" rows="8">{{ old('introduction') }}</textarea>
                        </div>
                    </li>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
@endsection
