<?php

namespace App\Http\Controllers;

use App\Models\Task;

class TaskController extends Controller {

    public function list() {

        $taskList = Task::all();
        // dump($taskList);
        return response()->json($taskList);
    }
}
