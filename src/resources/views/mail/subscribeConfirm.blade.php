@extends('mail.layout')

@section('content')
    <div>
        Hi, check this
        <a href="http://192.168.99.100/subscribe/confirm/{{$token}}">link</a>
        to confirm your subscription on
        <a href="http://192.168.99.100">Blog</a>
    </div>
@endsection
