// SendHttpRequest
const sendHttpRequest = (method, route, data) => {
  const promise = new Promise((resolve, reject) => {
    let xhr = new XMLHttpRequest();
    xhr.open(method, `http://localhost/todoApp/php/todo${route}`, true);
    xhr.onload = () => {
      resolve(xhr.response);
    };

    xhr.send(data);
  });
  return promise;
};

// Show Todos

const showTodos = async () => {
  const todos = document.querySelector(".todos");

  await sendHttpRequest("GET", "/ViewTodos.php")
    .then((response) => {
      todos.innerHTML = response;
    })
    .catch((error) => {
      console.log(error);
    });
};

document.addEventListener("DOMContentLoaded", showTodos);

const form = document.querySelector(".todo-form");
const todo = document.querySelector(".todo-input");

const addTodo = async (e) => {
  e.preventDefault();
  let formdata = new FormData();
  formdata.append("todos", todo.value);
  formdata.append("completed", 0);
  formdata.append("createdAt", new Date().toISOString());

  await sendHttpRequest("POST", "/AddTodo.php", formdata)
    .then((response) => {
      console.log(response);
      showTodos();
      // empty the input value after submitted
      todo.value = "";
    })
    .catch((error) => {
      console.log(error);
    });
};

form.addEventListener("submit", addTodo);

const deleteTodo = async (id) => {
  let formData = new FormData();
  formData.append("id", id);

  await sendHttpRequest("POST", "/DeleteTodo.php", formData)
    .then((response) => {
      console.log(response);
      showTodos();
    })
    .catch((error) => {
      console.log(error);
    });
};
