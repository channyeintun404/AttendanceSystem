@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <!-- {!!Form::open(['action'=> "PostsController@store","method"=> "POST","enctype"=>"multipart/form-data"])  !!}
                    <div class="form-group">
                        {{Form::label("title","Title")}}
                        {{Form::text("title","",["class"=>"form-control","placeholder"=>"Title"])}}
                    </div>
                    <div class="form-group">
                        {{Form::label("body","Body")}}
                        {{Form::textarea("body","",["class"=>"form-control","placeholder"=>"Body"])}}
                    </div>
                    <div class="form-group">
                        {{Form::file('cover_image')}}
                    </div>
                    {!! Form::submit("Sumit",["class"=> "btn btn-primary"])!!}
                    {!! Form::close() !!} -->

                    @foreach($posts as $post)
                      @if($loop->last)
                        @if($post->checkOut!==null)
                            <button class="btn btn-primary"> {{$post->checkOut}}</button>
                        @else
                            <a class="btn btn-primary" href="/posts/{{$post->id}}/edit">CheckOut</a>
                        @endif

                        @if($post->checkIn!==null)
                            <button class="btn btn-primary"> {{$post->checkIn}}</button>
                        @else
                            <a class="btn btn-primary" href="/posts/create">CheckIn</a> 
                        @endif
                      @endif                
                    
                    @endforeach
                    @if(count($posts) == null)
                    <a class="btn btn-primary" href="/posts/create">CheckIn</a> 
                    @endif
                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
