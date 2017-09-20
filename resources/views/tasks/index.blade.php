@extends('layouts/app')


@section('content')
    <div class="panel panel-default">
        <div class="panel-body">
          @include('common/errors')
          <form class="form-horizontal" action="{{ url('task') }}" method="post">
            <div class="form-group">
              <div class="col-sm-6">
                <label class="control-label" for="name">Task</label>
                <input class="form-control" type="text" name="name" id="name" value="" />
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-offset-3 col-sm-6">
                <button class="btn btn-default" type="submit">Add</button>
              </div>

            </div>

            {{ csrf_field() }}

          </form>

        </div>
    </div>

    @if ($tasks->count())
        <div class="panel panel-default">
          <div class="panel-heading">
            Current Tasks
          </div>
          <div class="panel-body">
            <table class="table table-striped">
              <thead>
                <th>Task</th>
                <th>&nbsp;</th>
              </thead>
              <tbody>
                @foreach ($tasks as $task)
                    <tr>
                      <td>{{ $task -> name }}</td>
                      <td>
                        <form action="{{ url('task/'.$task->id) }}" method="post">
                          <button class="btn btn-danger" type="submit" name="delete">Delete</button>
                          {{ method_field('DELETE') }}
                          {{ csrf_field() }}
                        </form>
                      </td>
                      <td>
                        <form action="{{ url('viewUpdate/'.$task->id) }}" method="get">
                          <button class="btn btn-warning" type="submit" name="update">Update</button>
                        </form>
                      </td>
                    </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>

    @endif
@endsection
