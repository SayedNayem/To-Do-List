document.addEventListener("DOMContentLoaded", function () {
    const taskInput = document.getElementById("taskInput");
    const addTaskButton = document.getElementById("addTask");
    const favoritesList = document.getElementById("favoritesList");
    const inboxList = document.getElementById("inboxList");


    function addNewTask() {
        const taskText = taskInput.value.trim();
        if (taskText === "") return;

        const taskItem = document.createElement("li");
        taskItem.classList.add("list-group-item", "task");
        taskItem.textContent = taskText;

        const deleteButton = document.createElement("button");
        deleteButton.classList.add("btn", "btn-danger", "btn-sm", "float-right");
        deleteButton.textContent = "Delete";

        const favoriteButton = document.createElement("button");
        favoriteButton.classList.add("btn", "btn-warning", "btn-sm", "float-right", "mr-2");
        favoriteButton.textContent = "Favorite";

        const inboxButton = document.createElement("button");
        inboxButton.classList.add("btn", "btn-info", "btn-sm", "float-right", "mr-2");
        inboxButton.textContent = "Inbox";

        deleteButton.addEventListener("click", function () {
            taskItem.remove();
        });

        favoriteButton.addEventListener("click", function () {
            favoritesList.appendChild(taskItem);
            favoriteButton.style.display = "none";
            inboxButton.style.display = "inline-block";
        });

        inboxButton.addEventListener("click", function () {
            inboxList.appendChild(taskItem);
            favoriteButton.style.display = "inline-block";
            inboxButton.style.display = "none";
        });

        taskItem.appendChild(deleteButton);
        taskItem.appendChild(favoriteButton);
        taskItem.appendChild(inboxButton);

        inboxList.appendChild(taskItem);
        taskInput.value = "";
    }

    addTaskButton.addEventListener("click", addNewTask);

    taskInput.addEventListener("keyup", function (event) {
        if (event.key === "Enter") {
            addNewTask();
        }
    });
});
