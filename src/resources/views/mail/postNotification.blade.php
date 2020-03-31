@extends('mail.layout')

@section('content')
    Hi, on my blog new post <a href="{{route('post.show', $post->slug)}}">{{$post->title}}</a>
@endsection
