@extends('admin.layout')

@section('content')
    <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Добавить тег
            <small>приятные слова..</small>
        </h1>
    </section>
    <section class="content">
        <form method="POST" action = "{{route('tags.store')}}">
            {{ csrf_field() }}

            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Добавляем тег</h3>
                </div>
                <div class="box-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            @include('admin.errors')

                            <label for="exampleInputEmail1">Название</label>
                            <input
                                type="text"
                                name = "title"
                                class="form-control"
                                id="exampleInputEmail1"
                                placeholder="">
                        </div>
                    </div>
                </div>
                <div class="box-footer">
                    <button class="btn btn-default">Назад</button>
                    <button class="btn btn-success pull-right">Добавить</button>
                </div>
            </div>
        </form>

    </section>
    <!-- /.content -->
</div>
@endsection