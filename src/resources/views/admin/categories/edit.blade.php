@extends('admin.layout')

@section('content')
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Добавить категорию
            <small>приятные слова..</small>
        </h1>
    </section>

    <!-- Main content -->
    <section class="content">

        <!-- Default box -->
        <form method="POST" action = "{{route('categories.update', $category->id)}}">
            {{ csrf_field() }}
            {{ method_field('PUT') }}

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Обновляем категорию</h3>
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            @include('admin.errors')

                            <label for="exampleInputEmail1">Название</label>
                            <input
                                type="text"
                                class="form-control"
                                id="exampleInputEmail1"
                                placeholder=""
                                value="{{ $category->title }}"
                                name="title">
                        </div>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    <button class="btn btn-default">Назад</button>
                    <button class="btn btn-success pull-right">Обновить</button>
                </div>
                <!-- /.box-footer-->
            </div>
        </form>
        <!-- /.box -->

    </section>
    <!-- /.content -->
</div>
@endsection