@extends('layouts.profile')
@section('title', 'プロフィール編集')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h2>プロフィール編集</h2>
                <form action="{{ action('Admin\ProfileController@renewal') }}" method="post" enctype="multipart/form-data">

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
                            <input type="text" class="form-control" name="name" value="{{ $profile_form->name }}" >
                        </div>
                    </li>
                    <li class="form-group row">
                        <label class="col-md-2" for="gender">性別(gender)</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="gender" value="{{ $profile_form->gender }}">
                        </div>
                    </li>
                    <li class="form-group row">
                        <label class="col-md-2" for="hobby">趣味(hobby)</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="hobby" rows="5">{{ $profile_form->hobby }}</textarea>
                        </div>
                    </li>
                    <li class="form-group row">
                        <label class="col-md-2" for="introduction">自己紹介欄(introduction)</label>
                        <div class="col-md-10">
                            <textarea class="form-control" name="introduction" rows="8">{{ $profile_form->introduction }}</textarea>
                        </div>
                    </li>
					<div class="form-group row">
					    <div class="col-md-10">
						<input type="hidden" name="id" value="{{ $profile_form->id }}">    
                    {{ csrf_field() }}
					    </div>
					</div>
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
                    <div class="col-md-4 mx-auto">
                        <h2>編集履歴</h2>
                        <ul class="list-group">
			    @if ($profile_form->profilehistories != NULL)
				@foreach ($profile_form->profilehistories as $profilehistory)
				    <li class="list-group-item">{{ $profilehistory->edited_at }}</li>
				@endforeach
			    @endif
			</ul>
                    </div>
            </div>
        </div>
    </div>
@endsection