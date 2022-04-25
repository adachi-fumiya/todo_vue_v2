<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>Todoリスト</title>
        <meta charset="UTF-8">
        <meta name="viewpot" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <style>
        input:disabled {
            background: none;
            border: none;
        }
    </style>
<body>
    <div id="todo_index" class="container" style="margin-top :50px;">
        <h1>Todoリストの追加</h1>
        <div class="form-group">
            <label>やることを追加してください</label>
            <input type="text" name="body" class="form-control" placeholder="todo list" v-model="inputTodo">
        </div>
        <button type="button" class="btn btn-primary" @click="addTodo">追加する</button>

        <h1 style="margin-top:50px;">Todoリスト</h1>
        <table class="table table-striped" style="max-width:1000px; margin-top:20px;">

        <tbody>
            <tr v-for="(todo, index) in todos" :key="todo">
                <td><input type="text" v-model="todo.body" :disabled="todo.editFlag"></td>
                <td>
                    <button class="btn btn-primary" @click="editTodo(todo, index)" v-if="todo.editFlag">編集</button>
                    
                    <button class="btn btn-primary" v-else @click="editComplete(todo, index)">完了</button>
                </td>
                <td>
                    <button class="btn btn-danger" @click="DeleteTodo(todo.id, index)">削除</button>
                </td>
            </tr>
        </table>
    </div>
    <script src="{{ mix('js/dist/index.js') }}"></script>
</body>
</html>
