Vue.createApp({
    data() {
        return {
            todos: [],
            inputTodo: ''
        };
    },
    methods: {
        getTodo() {
            axios.get('/todo/info')
            .then((res) => {
                this.todos = res.data;
            })
        },
        addTodo() {
            axios.post('/todo/store', {
                body: this.inputTodo
            }).then(res => {
                this.todos.push({
                    body: this.inputTodo,
                    editFlag: true
                });
                this.inputTodo = '';
                this.getTodo();    
            })
        },
        DeleteTodo(todoId, index) {
            axios.post(`/todo/delete/${todoId}`)
            .then(res => {
                this.todos.splice(index, 1);
                this.getTodo();
            })
        },
        editTodo(todo, index) {
            this.todos.splice(index, 1, {
                id: todo.id,
                body: todo.body,
                editFlag: false
            })
        },
        editComplete(todo, index) {
            axios.post(`/todo/update/${todo.id}`, {
                body: todo.body
            }).then(() => {
                this.todos.splice(index, 1, {
                    id: todo.id,
                    body: todo.body,
                    editFlag: true
                })
                this.getTodo();
            })
        }
    },
    mounted() {
        this.getTodo();
    },
}).mount("#todo_index");