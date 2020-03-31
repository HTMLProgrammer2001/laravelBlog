@extends('admin.layout')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <h1>
                Подписчики
            </h1>
            <ol class="breadcrumb">
                <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
                <li><a href="#">Examples</a></li>
                <li class="active">Blank page</li>
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
                    <div class="form-group">
                        <a href="{{route('subscribers.create')}}" class="btn btn-success">Добавить</a>
                    </div>
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Email</th>
                            <th>Действия</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach($subscribers as $subscriber)
                            <tr>
                                <td>{{$subscriber->id}}</td>
                                <td>{{$subscriber->email}}</td>
                                <td>
                                    <form action="{{route('subscribers.update', $subscriber->id)}}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <button type = "submit" onclick="return confirm('Are you sure?')">
                                            @if(!$subscriber->token)
                                                <i class="fa fa-thumbs-o-down"></i>
                                            @else
                                                <i class="fa fa-thumbs-o-up"></i>
                                            @endif
                                        </button>
                                    </form>

                                    <form method="POST" action = "{{ route('subscribers.destroy', $subscriber->id) }}">
                                        @csrf
                                        @method('DELETE')

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
