@extends('layouts.app')
@section('title','Task List')


@section('content')
<div class="col-sm-offset-2 col-sm-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                New Task
            </div>

            <div class="panel-body">
                <!-- Display Validation Errors -->
                <!-- New Task Form -->
                @if ($errors->any())
                <div class="alter alter-danger">
                    <ul>
                 @foreach ($errors->all() as $error)
                     <li>{{ $error}}<li>
                    @endforeach
                    </ul>
                </div>
                @endif
            <form action="{{route('store')}}" method="POST" class="form-horizontal">
                      @csrf
                    <!-- Task Name -->
                    <div class="form-group">
                        <label for="task-name" class="col-sm-3 control-label">Task</label>

                        <div class="col-sm-6">
                            <input type="text" name="name" id="task-name" class="form-control" value="">
                        </div>
                    </div>

                    <!-- Add Task Button -->
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-default">
                                <a href="/tasks/index" class="fa fa-btn fa-plus"></a>Add Task
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Current Tasks -->
            <div class="panel panel-default">
                <div class="panel-heading">
                    Current Tasks
                </div>

                <div class="panel-body">
                    <table class="table table-striped task-table">
                        <thead>
                            <th>Task</th>
                            <th>&nbsp;</th>
                        </thead>
                        <tbody>
                            @foreach ($tasks as $task)
                            <tr>
                                    <td class="table-text"><div>{{$task->name}}</div></td>

                                    <!-- Task Delete Button -->
                                    <td>
                                    <form action="/tasks/index/delete/{{$task->id}}" method="POST">
                                        @csrf
                                        @method('delete')
                                            <button type="submit" class="btn btn-danger">
                                                <i class="fa fa-btn fa-trash"></i>Delete
                                            </button>
                                            <td>
                                                <a href="/tasks/index/{{$task->id}}/edit" class="btn btn-xs btn-info">Edit</a>

                                        </td>
                                        </form>
                                    </td>
                                </tr>

                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
    </div>
@endsection

