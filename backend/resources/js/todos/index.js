import axios from "axios";
import { createApp } from "vue";

createApp({
    data() {
        return {
            todos: [],
            inputTodo: ''
        };
    },
    methods: {
        onClick() {
            this.counter += 1;
        },
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
                    key: Math.random() * 1000000,
                    body: this.inputTodo
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
        }
    },
    mounted() {
        this.getTodo();
    },
}).mount("#todo_index");