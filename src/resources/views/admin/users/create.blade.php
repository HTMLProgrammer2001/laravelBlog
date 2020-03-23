@extends('admin.layout')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Добавить пользователя
                <small>приятные слова..</small>
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">
            <form method="POST" enctype="multipart/form-data" action = "{{route('users.store')}}">
            {{ csrf_field() }}

            <!-- Default box -->
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Добавляем пользователя</h3>
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            @include('admin.errors')

                            <label for="exampleInputEmail1">Имя</label>
                            <input
                                    type="text"
                                    class="form-control"
                                    id="exampleInputEmail1"
                                    name="name"
                                    value="{{old('name')}}"
                                    placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">E-mail</label>
                            <input
                                    type="email"
                                    class="form-control"
                                    id="exampleInputEmail1"
                                    name="email"
                                    value="{{old('email')}}"
                                    placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Пароль</label>
                            <input
                                    type="password"
                                    class="form-control"
                                    id="exampleInputEmail1"
                                    name="password"
                                    placeholder="">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Аватар</label>
                            <input type="file" id="exampleInputFile" name="avatar">

                            <p class="help-block">Какое-нибудь уведомление о форматах..</p>
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button class="btn btn-default">Назад</button>
                    <button class="btn btn-success pull-right">Добавить</button>
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
            </form>
        </section>
        <!-- /.content -->
    </div>
@endsection