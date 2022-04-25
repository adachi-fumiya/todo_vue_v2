<!DOCTYPE html>
<html lang="ja">
    <head>
        <title>Todo List</title>
        <meta charset="UTF-8">
        <meta name="viewpot" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
        <script src="{{ mix('js/app.js') }}"></script>
    </head>
    <style>
        input:disabled {
            background: none;
            border: none;
        }
    </style>
<body>
    <div id="todo_index" class="container mt-5" v-cloak>
        <div class="d-flex flex-row bd-highlight mb-5">
            <div class="col-8" style="padding-left: 0;">
                <input type="text" name="body" class="form-control" placeholder="todo list" v-model="inputTodo">
            </div>
            <button class="btn btn-primary col-4" @click="addTodo">追加</button>
        </div>

        <table class="table table-striped">
            <tr v-for="(todo, index) in todos" :key="todo">
                <td>
                    <input class="align-middle" type="text" v-model="todo.body" :disabled="todo.editFlag">
                </td>
                <td class="text-center">
                    <button class="btn btn-primary mr-3" @click="editTodo(todo, index)" v-if="todo.editFlag">編集</button>
                    <button class="btn btn-primary mr-3" v-else @click="editComplete(todo, index)">完了</button>
                    <button class="btn btn-danger" @click="DeleteTodo(todo.id, index)">削除</button>
                </td>
            </tr>
        </table>
    </div>
    <script src="{{ mix('js/dist/index.js') }}"></script>
</body>
</html>
