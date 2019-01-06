@extends('layouts.front')

@section('content')
    <div class="container">
        <hr color="#c0c0c0">
        @if (!is_null($person))
            <div class="row">
                <div class="person col-md-10 mx-auto">
            
                    <div class="row">
                        <div class="col-md-5">
                            <div class="caption mx-auto">
                                <div class="name p-2">
                                    <h1>{{ str_limit($person->name, 70) }}</h1>
                                </div>
                            </div>
                        </div>    
                        <div class="col-md-1">
                            <span style="position:absolute;bottom:0">
                            <p class="gender">{{ str_limit($person->gender, 2) }}</p>
                            </span>
                        </div>                         
                    </div>
                    <div class="row">
                         <div class="col-md-10">
                            <p class="hobby">{{ str_limit($person->hobby, 650) }}</p>
                        </div>
                    </div>
                    <div class="row">     
                        <div class="col-md-10">
                            <p class="introduction">{{ str_limit($person->introduction, 650) }}</p>
                        </div>
                    </div>
                </div>
            </div>
        @endif
        <hr color="#c0c0c0">
        <div class="row">
            <div class="posts col-md-8 mx-auto mt-3">
            
                @foreach($posts as $post)
                    <div class="post">
                        <div class="row">
                            <div class="text col-md-6">
                                <div class="date">
                                    {{ $post->updated_at->format('Y年m月d日') }}
                                </div>
                                <div class="name">
                                    {{ str_limit($posts->name, 20) }}
                                </div>
                                <div class="gender mt-3">
                                    {{ str_limit($posts->gender, 1500) }}
                                </div>
                                <div class="hobby mt-3">
                                    {{ str_limit($posts->hobby, 1500) }}
                                </div>
                                <div class="gender mt-3">
                                    {{ str_limit($posts->introduction, 1500) }}
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr color="#c0c0c0">
                @endforeach
            </div>
        </div>
    </div>
    </div>
@endsection