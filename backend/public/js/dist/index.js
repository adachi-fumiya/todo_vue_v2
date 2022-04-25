/******/ (() => { // webpackBootstrap
var __webpack_exports__ = {};
/*!*************************************!*\
  !*** ./resources/js/todos/index.js ***!
  \*************************************/
Vue.createApp({
  data: function data() {
    return {
      todos: [],
      inputTodo: ''
    };
  },
  methods: {
    getTodo: function getTodo() {
      var _this = this;

      axios.get('/todo/info').then(function (res) {
        _this.todos = res.data;
      });
    },
    addTodo: function addTodo() {
      var _this2 = this;

      axios.post('/todo/store', {
        body: this.inputTodo
      }).then(function (res) {
        _this2.todos.push({
          body: _this2.inputTodo,
          editFlag: true
        });

        _this2.inputTodo = '';

        _this2.getTodo();
      });
    },
    DeleteTodo: function DeleteTodo(todoId, index) {
      var _this3 = this;

      axios.post("/todo/delete/".concat(todoId)).then(function (res) {
        _this3.todos.splice(index, 1);

        _this3.getTodo();
      });
    },
    editTodo: function editTodo(todo, index) {
      this.todos.splice(index, 1, {
        id: todo.id,
        body: todo.body,
        editFlag: false
      });
    },
    editComplete: function editComplete(todo, index) {
      var _this4 = this;

      axios.post("/todo/update/".concat(todo.id), {
        body: todo.body
      }).then(function () {
        _this4.todos.splice(index, 1, {
          id: todo.id,
          body: todo.body,
          editFlag: true
        });

        _this4.getTodo();
      });
    }
  },
  mounted: function mounted() {
    this.getTodo();
  }
}).mount("#todo_index");
/******/ })()
;