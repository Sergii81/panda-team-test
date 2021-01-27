@extends('layouts.app')

@section('title',  __('Tasks'))

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        {{ __('Tasks') }}
                        <a class="btn btn-primary" href="{{route('add.form')}}">Add Task</a>
                    </div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <table id="tasks_table" class="table table-bordered table-hover dataTable dtr-inline" role="grid" >
                            <thead>
                            <tr role="row">
                                <th class="sorting_asc" >#</th>
                                <th class="sorting" >User Name</th>
                                <th class="sorting" >User Email</th>
                                <th>Task Text</th>
                                <th class="sorting">Task Status</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($tasks as $task)

                                <tr role="row" class="odd">
                                    <td class="dtr-control sorting_1" tabindex="0">{{$task->id}}</td>
                                    <td>{{$task->name}}</td>
                                    <td>{{$task->email}}</td>
                                    <td>{{$task->text}}</td>
                                    @guest

                                            <td>
                                                @if($task->status)
                                                    <span>отредактировано администратором</span>
                                                @endif
                                            </td>
                                    @else
                                        @if(Auth::user()->name == 'admin')
                                            <td>
                                                <a class="btn btn-warning" href="{{route('edit.form', $task->id)}}">Edit</a>
                                            </td>
                                            @endif
                                    @endguest
                                </tr>

                            @endforeach
                            </tbody>
                            <tfoot>
                            <tr role="row">
                                <th>#</th>
                                <th>User Name</th>
                                <th>User Email</th>
                                <th>Task Text</th>
                                <th>Task Status</th>
                            </tr></tfoot>
                        </table>
                        {{ $tasks->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready( function () {
            $('#tasks_table').DataTable({
                "paging": false
            });
        } );
    </script>
@endsection
