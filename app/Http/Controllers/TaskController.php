<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index(Request $request)
    {
        return Task::all();
    }
    public function store(TaskRequest $request)
    {
        $validated = $request->validated();
        $task = Task::create(array_merge($validated, ["status" => "pending"]));
        return $task;
    }
    public function delete(Request $request)
    {
    }
}
