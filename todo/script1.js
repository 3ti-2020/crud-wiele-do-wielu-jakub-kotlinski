const todoList = document.querySelector("#todoList");
const todoForm = document.querySelector("#todoForm");
const todoSearch = document.querySelector("#todoSearch");
const todoTextarea = todoForm.querySelector('textarea');

function addTask(text) 
{
    console.log("Dodaję zadanie do listy")
}

todoForm.addEventListener("submit", e => {
    e.preventDefault();

    if (todoTextarea.value !== "") 
    {
        addTask(todoTextarea.value);
        todoTextarea.value = "";
    }
});

function addTask(text) {
    const element = document.createElement("div");
    element.classList.add("element");

    //pobieram zawartość templatki
    const elementInner = document.querySelector("#elementTemplate").content.cloneNode(true);

    //wrzucam do elementu
    element.append(elementInner);

    //tworzę datę
    const date = new Date();
    const dateText = `${date.getDate()} - ${date.getMonth()+1} - ${date.getFullYear()} godz.: ${date.getHours()}:${date.getMinutes()}`;
    element.querySelector(".element-date").innerText = dateText;

    //wstawiam tekst
    element.querySelector(".element-text").innerText = text;

    //i wrzucam element do listy
    todoList.append(element);
}

todoList.addEventListener("click", e => {
    if (e.target.classList.contains("element-delete")) {
        e.target.closest(".element").remove();
    }
});