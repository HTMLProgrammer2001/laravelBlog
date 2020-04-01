@extends('mail.layout')

@section('content')
    <div>
        Привет, перейди по
        <a href="http://192.168.99.100/subscribe/confirm/{{$token}}">ссылке</a>
        чтобы подтвердить подписку на рассылку от
        <a href="http://192.168.99.100">HTMLProgrammer Blog</a>
    </div>
@endsection
