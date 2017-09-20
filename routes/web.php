<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Task;
use Illuminate\Http\Request;

// Route for view tasks
Route::get('/', function () {
  $tasks = Task::orderBy('created_at', 'asc')->get();
  return view ('tasks/index', [
    'tasks' => $tasks,
  ]);
});

// 3 way to get data from database
    // second
    // return view ('tasks/index')->with([
    //     'tasks' => $tasks
    // ]);

    // third
    // return view ('tasks/index')->withTasks();


// Route for add new task
Route::post('/task', function (Request $request){
    $validator = Validator::make($request->all(), [
      'name' => 'required|max:255',
    ]);

    if ($validator->fails()) {
      return redirect('/')
          ->withInput()
          ->withErrors($validator);
    }


// create new task et save to database
    $task = new Task;
    $task->name = $request->name;
    $task->save();

// second version for create new task et save to database but need $protected fillable to model Task
    // Task::create([
    //     'name' => $request->name,
    // ]);


    return redirect('/');
});


// Route for delete task
Route::delete('/task/{task}', function(Task $task){
    $task->delete();
    return redirect('/');

});


Route::get('/viewUpdate/{task}', function(Task $task){
    return view ('tasks/update', [
      'task' => $task
    ]);
});


Route::put('/update/{task}', function (Task $task, Request $request, $id){
  todolist::table('tasks')
          ->where('id', $request->id)
          ->update(['name' => $request->name]);
  return redirect('/');
});



//
