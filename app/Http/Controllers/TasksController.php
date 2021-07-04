<?php

namespace App\Http\Controllers;

use App\Models\Task;

use Illuminate\Http\Request;
use App\Http\Requests\task\AddTaskRequest;
use App\Http\Requests\task\EditActionTaskRequest;

use Auth;

class TasksController extends Controller
{
    // show create form
    public function create(Request $request){

        // dd($request->offer);
        return view('manage-task', ['offer' => $request->offer]);
    }

    // add task to database
    public function createAction(AddTaskRequest $request){
        $validated = $request->validated();

        // dd($validated, $request->offer);

        $task = (new Task)->add($request->offer, $validated);

        return redirect()->route('offer', ['id' => $request->offer]);
    }

    // shows Task edit form
    public function edit(Request $request){
        $task = Task::findOrFail($request->id);
        $offer = $request->offer;

        return view('manage-task', compact('offer', 'task'));
    }


    // edit task in database
    public function editAction(EditActionTaskRequest $request){
        $validated = $request->validated();


        $task = (new Task)->edit($request->id, $validated);

        return redirect()->route('offer', ['id' => $request->offer]);
    }

    // delete an task
    public function delete(Request $request){
        // dd($request->id);
        $task = (new Task)->deleteTask($request->id);

        return redirect()->route('offer', ['id' => $request->offer]);
    }
}
