<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Todo;

class todoController extends Controller
{
    public function index() 
    {
      $todos = $this->get_todos();
      $done_todos = $this->get_done_todos();
      return view('index', compact('todos', 'done_todos'));
    }

    public function get_todos()
    {
      return Todo::where('status', '0')->orderby('updated_at', 'asc')->get();
    }

    public function get_done_todos()
    {
      return Todo::where('status', '1')->orderby('updated_at', 'asc')->get();
    }

    public function add_todo(Request $request) 
    {
      
      if( $request['addNew'] == 'Add') {
        Todo::create([ 'body'  => $request['task'] ]);
        return redirect()->route('index');
      }
      else {
        return $this->edit_todo($request);
      }
    }

    public function edit_todo($request) 
    {
      Todo::where('todo_id', $request['task_id'])->update([
        'body' => $request['task']
      ]);
      return redirect()->route('index');
    }

    public function edit_todo_show(Request $request)
    {
      $todos = $this->get_todos();
      $done_todos = $this->get_done_todos();
      $edit_todo = Todo::where('todo_id', $request['id'])->get();
      return view('index', compact('todos', 'done_todos', 'edit_todo'));
    }

    public function delete_todo(Request $request) 
    {
      Todo::where('todo_id', $request['id'])->delete();
      return redirect()->route('index');
    }

    public function return_todo(Request $request) 
    {
      Todo::where('todo_id', $request['id'])->update([
        'status' => '0'
      ]);
      return redirect()->route('index');
    }

    public function done_todo(Request $request) 
    {
      Todo::where('todo_id', $request['id'])->update([
        'status' => '1'
      ]);
      return redirect()->route('index');
    }
}
