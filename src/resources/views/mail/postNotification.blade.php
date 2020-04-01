@extends('mail.layout')

@section('content')
    Привет, на моём блоге новый пост <a href="{{route('post.show', $post->slug)}}">{{$post->title}}</a>
@endsection
