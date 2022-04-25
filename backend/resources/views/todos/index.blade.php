<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>Todoリスト</title>
        <meta charset="UTF-8">
        <meta name="viewpot" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>
<body>
    <div class="container" style="margin-top :50px;">
        <h1>Todoリストの追加</h1>
        <form action="{{ route('todos.store') }}" method="post">
            {{csrf_field()}}
            <div class="form-group">
                <label>やることを追加してください</label>
                <input type="text" name="body" class="form-control" placeholder="todo list" style="max-width:1000px;">
            </div>
        <button type="submit" class="btn btn-primary">追加する</button>
        </form>

        <h1 style="margin-top:50px;">Todoリスト</h1>
        <table class="table table-striped" style="max-width:1000px; margin-top:20px;">

        <tbody>
            @foreach($todos as $todo)
            <tr>
                <td>{{$todo->body}}</td>
                <td>
                    <form action="{{ route('todos.edit',['id' => $todo->id]) }}" method="get">
                        <button type="submit" class="btn btn-primary">編集</button>
                    </form>
                </td>

                <td>
                    <form action="{{ route('todos.delete', $todo->id) }}" method="post">
                        @csrf
                        <button type="submit" class="btn btn-danger">削除</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </table>
    </div>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script>
        (function(){
            'use strict';

            var cmds = document.getElementsByClassName('del');
            var i;

            for(i = 0; i < cmds.length; i++){
                cmds[i].addElementListener('click', function(e) {
                    e.preventDefault();
                    if(confilm('are you sure?')) {
                        document.getElementById('form_' + this.dataset.id).submit();
                    }
                });
            }
        })();
    </script>
</body>
</html>
