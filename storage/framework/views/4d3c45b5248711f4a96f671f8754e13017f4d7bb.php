<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>IndexedDB Todo List</title>
  </head>
  <body>
    <!-- OUR CONTENT -->
    <main>
      <h1>IndexedDB Todo-List</h1>
      <div id="form">
        <input type="text" placeholder="new todo here" />
        <button>Add Todo</button>
      </div>
      <div id="todos">
        <ul></ul>
      </div>
    </main>

    <script>
      // Variables holding our inputs
      const textInput = document.querySelector("[type='text']");
      const button = document.querySelector("button");
      // Array to hold todos
      const todos = [];
      // function to render todos
      function renderTodos() {
        const ul = document.querySelector("#todos ul");
        ul.innerHTML = "";
        for (todo of todos) {
          ul.innerHTML += `<li>${todo}</li>`;
        }
      }
      // Function to check indexedDB implementation and return it
      function getIndexDB() {
        const indexedDB =
          window.indexedDB ||
          window.mozIndexedDB ||
          window.webkitIndexedDB ||
          window.msIndexedDB ||
          window.shimIndexedDB;
        if (indexedDB) {
          return indexedDB;
        }
        console.log("indexedDB not supported by this browser");
        return null;
      }
      const indexedDB = getIndexDB();
      // console.log(indexedDB)
      const request = indexedDB.open("todoDB", 2);
      //console.log(request)
      //onerror handling
      request.onerror = (event) => console.error("IndexDB Error: ", event);
      //onupgradeneeded
      request.onupgradeneeded = () => {
        // grab the database connection
        const db = request.result;
        // define a new store
        const store = db.createObjectStore("todos", {
          keyPath: "id",
          autoIncrement: true,
        });
        // specify a property as an index
        store.createIndex("todos_text", ["text"], {unique: false})
      };
      //onsuccess
      request.onsuccess = () => {
          console.log("Database Connection Established")
          //grab the database connection
          const db = request.result
          // create a transaction object
          const tx = db.transaction("todos", "readwrite")
          //create a transaction with our store
          const todosStore = tx.objectStore("todos")
          //get all todos
          const query = todosStore.getAll()
          //use data from query
          query.onsuccess =  () => {
              console.log("All Todos: ", query.result)
              for (todo of query.result){
                  todos.push(todo.text)
              }
              renderTodos()
          }
      }
      // button event
      button.addEventListener("click", (event) => {
          // setup a transaction
          const db = request.result
          const tx = db.transaction("todos", "readwrite")
          const todosStore = tx.objectStore("todos")
          // add a todo
          const text = textInput.value
          todos.push(text) // add to todo array
          todosStore.put({text}) // add to indexedDB
          renderTodos() // update dom
      })

      renderTodos();
    </script>
    <!-- OUR STYLING -->
    <style>
      body {
        text-align: center;
      }
      h1 {
        color: brown;
      }
    </style>
  </body>
</html><?php /**PATH D:\laravel projects\EmployeeTemplate-main\resources\views/test.blade.php ENDPATH**/ ?>