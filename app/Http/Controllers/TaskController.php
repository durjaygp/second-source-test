<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Http\Controllers\Controller;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class TaskController extends Controller
{
    // Add Task
    public function store(Request $request)
    {
        try {
            $request->validate([
                'title' => 'required|string',
            ]);

            $task = Task::create([
                'title' => $request->title,
                'is_completed' => $request->input('is_completed', false),
            ]);

            return response()->json($task, 201);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $e->errors(),
            ], 422);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error creating task',
                'error' => $e->getMessage(),
            ], 500);
        }
    }

    // Update Task (Mark as Completed)
    public function update(Request $request, $id)
    {
        try {
            $task = Task::findOrFail($id);

            $request->validate([
                'is_completed' => 'required',
            ]);

            $task->is_completed = filter_var($request->is_completed, FILTER_VALIDATE_BOOLEAN);
            $task->save();

            return response()->json($task);

        } catch (ModelNotFoundException $e) {
            return response()->json(['message' => 'Task not found'], 404);

        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Validation failed',
                'errors' => $e->errors(),
            ], 422);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error updating task',
                'error' => $e->getMessage(),
            ], 500);
        }
    }



    // Get Pending Tasks
    public function pending()
    {
        try {
            $tasks = Task::where('is_completed', false)->get();
            return response()->json($tasks);

        } catch (\Exception $e) {
            return response()->json([
                'message' => 'Error fetching pending tasks',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
