@extends('admin.layout')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Изменить пользователя
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Изменяем пользователя</h3>
                </div>
                <form
                        method="POST"
                        enctype="multipart/form-data"
                        action = "{{route('users.update', $user->id)}}">
                    {{csrf_field()}}
                    {{method_field('PUT')}}
                <div class="box-body">
                    <div class="col-md-6">
                            @include('admin.errors')
                            <div class="form-group">
                                <label for="exampleInputEmail1">Имя</label>
                                <input type="text"
                                       class="form-control"
                                       id="exampleInputEmail1"
                                       name = "name"
                                       placeholder="" value="{{$user->name}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">E-mail</label>
                                <input type="email"
                                       class="form-control"
                                       id="exampleInputEmail1"
                                       name="email"
                                       placeholder="" value="{{$user->email}}">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Пароль</label>
                                <input type="password"
                                       class="form-control"
                                       id="exampleInputEmail1"
                                       name="password"
                                       placeholder="">
                            </div>
                            <div class="form-group">
                                <img src="{{$user->getAvatar()}}" alt="" width="200" class="img-responsive">
                                <label for="exampleInputFile">Аватар</label>
                                <input type="file" id="exampleInputFile" name="avatar">

                                <p class="help-block">Какое-нибудь уведомление о форматах..</p>
                            </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button class="btn btn-default">Назад</button>
                    <button class="btn btn-warning pull-right">Изменить</button>
                </div>
                <!-- /.box-footer-->
                </form>
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
@endsection
