@extends('admin.layout')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Добавить подписчика
            </h1>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <form action="{{route('subscribers.store')}}" method="post">
                @csrf
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Добавляем подписчика</h3>
                </div>
                <div class="box-body">
                    @include('admin.errors')

                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="">
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <a href="{{url()->previous()}}">
                        <button type="button" class="btn btn-default">Назад</button>
                    </a>
                    <button type="submit" class="btn btn-success pull-right">Добавить</button>
                </div>
                <!-- /.box-footer-->
            </div>
            <!-- /.box -->
            </form>

        </section>
        <!-- /.content -->
    </div>
@endsection
