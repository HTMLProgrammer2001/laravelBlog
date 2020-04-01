@extends('admin.layout')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Комментарии
            </h1>
            <ol class="breadcrumb">
                <li><a href="/admin"><i class="fa fa-dashboard"></i>Главная</a></li>
                <li><a href="{{route('comments.index')}}">Комментарии</a></li>
            </ol>
        </section>

        <!-- Main content -->
        <section class="content">

            <!-- Default box -->
            <div class="box">
                <div class="box-header">
                    <h3 class="box-title">Листинг сущности</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Текст</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($comments as $comment)
                            <tr>
                                <td>{{$comment->id}}</td>
                                <td>{{\Illuminate\Support\Str::words($comment->text, 10)}}</td>
                                <td>

                                    <form action="{{route('comments.update', $comment->id)}}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <button type = "submit" onclick="return confirm('Are you sure?')">
                                            @if($comment->status)
                                                <i class="fa fa-thumbs-o-down"></i>
                                            @else
                                                <i class="fa fa-thumbs-o-up"></i>
                                            @endif
                                        </button>
                                    </form>

                                    <form method="POST" action = "{{ route('comments.destroy', $comment->id) }}">
                                        {{ csrf_field() }}
                                        {{ method_field('DELETE') }}

                                        <button type = "submit" onclick="return confirm('Are you sure?')">
                                            <i class="fa fa-remove"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach

                        </tbody>
                    </table>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </section>
        <!-- /.content -->
    </div>
@endsection
