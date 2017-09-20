@extends('layouts/app')

<div class="container">
    <div class="panerl panel-default">
        <div class="panel-body">
          <form class="form-horizontal" action="{{ url('update/'.$task->id) }}" method="post">
            <div class="form-group">
              <label for="">Update Task</label>
              <input type="text" name="name" value="{{ $task->name }}"/>
              <button class="btn btn-warning" type="submit" name="update">Update</button>
              {{ method_field('PUT') }}
              {{ csrf_field() }}
            </div>
          </form>

        </div>

    </div>
</div>
