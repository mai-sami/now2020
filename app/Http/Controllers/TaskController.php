<?php

namespace App\Http\Controllers;
use App\Task;
use Illuminate\Http\Request;
use Illuminate\support\facades\DB;
class TaskController extends Controller
{
   public function index(){
   // $tasks = DB::table('tasks')->get();
 $tasks = Task::orderBy('created_at')->get();
    return view('tasks.index',compact('tasks'));
   }
  public function show($id){
  //  $tasks = DB::table('tasks')->find($id);
  $tasks=Task::where('id',$id)->get();
    return view('tasks.show',compact('tasks'));

  }
public function store(request $request){
    $request->validate(['name'=>'required|max:255']);
      $task=new Task();
      $task->name=$request->name;
      $task->save();
      return redirect('tasks/index');
}

public function destroy($id){
  // DB::table('tasks')->where('id','=',$id)->delete();
  $task=Task::find($id);
$task->delete();
   return redirect('tasks/index');
}

public function edit($id){
   //  dd(1);
   $tasks = DB::table('tasks')->find($id);


   return view('tasks.edit',compact('tasks'));
   //,compact('tasks')
}
public function update(Request $request, Task $tasks ){
  //  dd(20);
  //  $tasks->update($request->all());
    return view('tasks.index',compact('tasks'));
   DB::table('tasks')->increment([
     $tasks->name =$request->name,
           // 'created_at'=>now(),
     //'update_at'=>now(),
   ]);
      $tasks->save();
      return redirect('tasks/index');
   }
 }


