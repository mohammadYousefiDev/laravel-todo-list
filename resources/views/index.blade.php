<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Todo List</title>

        <!-- Styles -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
        <style>
            body{
              background: url('{{url("images/bg.png")}}');
              background-size: 350px 450px;
            }
        </style>
    </head>
    <body>
      <div class="col-md-5 p-5 rounded bg-white mx-auto mt-5">
        
        <form action="/" class="input-group-append" method="post" autocomplete="off">
          <div class="input-group mb-3">
            <input required type="text" value="@if(Route::is('edit')){{$edit_todo[0]->body}}@endif" name="task" class="form-control" name id="task" placeholder="write a task ...">

            <div class="input-group-append">

              <input name="@if(Route::is('edit')){{'updateLast'}}@else{{'addNew'}}@endif" type="submit" value="@if(Route::is('edit')){{'Edit'}}@else{{'Add'}}@endif" class="btn btn-primary" />

              <input type="hidden" type="submit" value="@if(Route::is('edit')){{ Route::input('id') }}@endif" name="task_id"/>

            </div>
          </div>
        </form>

        <h3 class="mt-4">Todos: </h3>

        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Task</th>
              <th scope="col">Date</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
              @foreach($todos as $key=>$todo)
                <tr>
                  <th scope="row">{{++$key}}</th>
                  <td>{{$todo['body']}}</td>
                  <td>{{$todo['updated_at']}}</td>
                  <td>
                    <a href="/done/{{$todo['todo_id']}}">Done</a> &nbsp;
                    <a href="/edit/{{$todo['todo_id']}}" class="text-success">Edit</a>
                    <a class="text-danger mx-2 d-inline-block" href="/delete/{{$todo['todo_id']}}">Delete</a>
                  </td>
                </tr>
              @endforeach
            </tbody>
        </table>

        <br />
        <h3>Done: </h3>

        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Task</th>
              <th scope="col">Date</th>
              <th scope="col">Actions</th>
            </tr>
          </thead>
          <tbody>
              @foreach($done_todos as $key=>$todo)
                <tr>
                  <th scope="row">{{++$key}}</th>
                  <td>{{$todo['body']}}</td>
                  <td>{{$todo['updated_at']}}</td>
                  <td>
                    <a href="/return/{{$todo['todo_id']}}">Return</a> &nbsp;
                    <a href="/edit/{{$todo['todo_id']}}" class="text-success">Edit</a>
                    <a class="text-danger mx-2 d-inline-block" href="/delete/{{$todo['todo_id']}}">Delete</a>
                  </td>
                </tr>
              @endforeach
            </tbody>
        </table>

      </div>
    </body>
</html>
