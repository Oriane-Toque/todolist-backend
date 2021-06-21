<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{

  public function list()
  {

    $taskList = Task::all();
    // dump($taskList);
    return response()->json($taskList);
  }

  public function add(Request $request)
  {

    $method = $request->method();

    if ($request->isMethod('post')) {

      if (!empty($request)) {

        $title = $request->input('title');
        $completion = $request->input('completion');
        $status = $request->input('status');
        $categoryId = $request->input('categoryId');

        $newTask = new Task;
        $newTask->title = $title;
        $newTask->completion = $completion;
        $newTask->status = $status;
        $newTask->categoryId = $categoryId;

        return response()->json($newTask, 201);

        // dump($newTask);
        // return response()->json($newTask);
      } else {

        return response()->json(['error' => 'Unauthorized'], 500);
      }
    }
  }
}
