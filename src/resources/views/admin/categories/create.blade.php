@extends('admin.layout')

@section('content')
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Добавить категорию
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <form method="POST" action = "{{route('categories.store')}}">
            {{ csrf_field() }}

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Добавляем категорию</h3>
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            @include('admin.errors')

                            <label for="exampleInputEmail1">Название</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" placeholder="" name="title">
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
        </form>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
@endsection
