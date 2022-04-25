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
                console.log(this.todos);
            })
        },
        addTodo() {
            axios.post('/todo/store', {
                body: this.inputTodo
            }).then((res) => {
                this.todos.push({
                    key: Math.random() * 1000000,
                    body: this.inputTodo
                });
                this.inputTodo = '';
            })
        }
    },
    mounted() {
        console.log('hello');
        this.getTodo();
    },
}).mount("#todo_index");