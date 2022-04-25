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
            @csrf
            <div class="form-group">
                <label>やることを追加してください</label>
                <input type="text" name="body" class="form-control" placeholder="todo list" style="max-width:1000px;">
            </div>
        <button type="submit" class="btn btn-primary">追加する</button>
        </form>

        <h1 style="margin-top:50px;">Todoリスト</h1>
        <table class="table table-striped" style="max-width:1000px; margin-top:20px;">

        <div id="counter">
            @{{ counter }}
            <button @click="onClick">click</button>
        </div>

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
    <script src="{{ mix('js/dist/index.js') }}"></script>
</body>
</html>
