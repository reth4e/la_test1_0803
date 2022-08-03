<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Todolist</title>
    <link rel="stylesheet" href="{{ asset('css/reset.css') }}">
    <link rel="stylesheet" href="{{ asset('css/index.css') }}">
  </head>
  <body>
    <div class="container">
      <div class="card">
        <p class="title mb-15">Todo List</p>
        @if (count($errors) > 0)
          <ul>
            @foreach ($errors->all() as $error)
              <li>{{$error}}</li>
            @endforeach
          </ul>
        @endif
        <div class="todo">
          <form action="/add" method="post" class="flex between mb-30">
            @csrf
            <input type="text" class="input-add" name="content">
            <input type="submit" class="button-add" value="追加">
          </form>
          <table>
            <tbody>
              <tr>
                <th>作成日</th>
                <th>タスク名</th>
                <th>更新</th>
                <th>削除</th>
              </tr>
              @foreach ($todos as $todo)
              <tr>
                <td>{{$todo->created_at}}</td>
                <form action="/update?id={{$todo->id}}" method="post">
                  @csrf
                  <td>
                    <input type="text" class="input-update" value="{{$todo->content}}" name="content">
                  </td>
                  <td>
                    <button class="button-update">更新</button>
                  </td>
                </form>
                <td>
                  <form action="/delete?id={{$todo->id}}" method="post">
                    @csrf
                    <button class="button-delete">削除</button>
                  </form>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </body>
</html>