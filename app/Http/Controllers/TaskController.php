<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\UserHasTask;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function __construct()
    {

        $this->middleware('auth:api');

    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $tasks = UserHasTask::with(['task'])->where('user_id',Auth::id())->orderBy('created_at', 'DESC')->get();
        $tasks = Task::orderBy('created_at', 'DESC')->get();

        $response = [
            'status' => 'true',
            'data' => $tasks,
            'errors' => [],
        ];

        return response()->json($response);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validated = Validator::make($request->only('title'), [
            'title' => 'required|regex:/^[a-zA-Z0-9\s]+$/|min:3|max:255'
        ], [
            'title.regex' => 'Title only accepts characters, numbers and spaces'
        ]);

        if ($validated->fails()) {
            $response = [
                'status' => 'false',
                'data' => [],
                'errors' => $validated->errors(),
            ];
        } else {
           $task = Task::create($validated->validated());

            // UserHasTask::create([
            //     'user_id' => Auth::id(),
            //     'task_id' => $task->id
            // ]);
            $response = [
                'status' => 'true',
                'data' => [],
                'errors' => [],
            ];
        }

        return response()->json($response);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $update = Task::findOrFail($id);
        $this->validate($request,[
            'title' => 'required|string|max:191',
        ]);
        $update->update($request->all());
    }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function markAsDone(request $request, $id){
        $validated = Validator::make($request->only('isCompleted'), [
            'isCompleted' => 'required|boolean'
        ]);

        if ($validated->fails()) {

            $response = [
                'status' => 'false',
                'data' => [],
                'errors' => $validated->errors(),
            ];
        } else {
            Task::where('id', $id)->update($validated->validated());

            $response = [
                'status' => 'true',
                'data' => [],
                'errors' => [],
            ];
        }

        return response()->json($response);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Task  $task
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $UserhasTask = UserHasTask::find($id);
        // $UserhasTask->task()->delete();
        // $UserhasTask->delete();
        $deleteTask = Task::where('id', $id)->delete();

        if (!$deleteTask) {
            $response = [
                'status' => 'false',
                'data' => [],
                'errors' => [],
            ];
        } else {
            $response = [
                'status' => 'true',
                'data' => [],
                'errors' => [],
            ];
        }
        return response()->json($response);
    }
}
