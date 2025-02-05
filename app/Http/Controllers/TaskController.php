<?php

namespace App\Http\Controllers;
use App\Models\Task;

use Illuminate\Http\Request;
use Illuminate\View\View;

class TaskController extends Controller
{


  //On This Method, A User Can Create A Task
    
  public function createTask(Request $req) {
      $req->validate([
        "title"=>"Required",
       "description"=>"Required",
        "date"=>"Required|date|after:today",
      ]);

      $task = new Task;
      $task->title = $req->title;
      $task->description = $req->description;
      $task->status = $req->status;
      $task->due_date = $req->date;

      $task->save();
      return back();
    }

  
  //This Method is A display Of All The Tasks
   public function displayTask() {
    
    $tasks = Task::all();
    //return view("dashboard",['tasks'=>$tasks]);
    return view("Task.task_display",['tasks'=>$tasks]);
   } 

   //VIEW Individual Task In Details
   public function viewTask(Task $task) {
    return view("Task.view_task", compact('task'));
   }


   //DELETE Individual Task In Details
   public function delete(Task $task){
    $task->delete();
    return redirect()->back();
   }

   //EDIT INDIVIDUAL TASK
   public function edit(Task $task){
    return view("Task.update_task",compact('task'));
   }


   //UPDATE INDIVIDUAL TASK
   public function update(Request $req) {

     $update = Task::find($req->id);
     $update->title = $req->title;
     $update->due_date = $req->date;
     $update->status = $req->status;
     $update->description = $req->description;

     $update->save();
     return redirect("displayTask");

   }

   // FILTER TASKS
   public function search() {
    $status = $_GET['search'];
    $result = Task::where("status","like","%".$status."%")->get();
    return view("Task.search_result",compact('result'));
   }

}
