let tasks = [];


document.getElementById('saveTask').addEventListener('click', () => {
    let taskName = document.getElementById('taskName').value;
    if (taskName) {
        tasks.push(taskName);
        let listTask = document.createElement('li');
        listTask.textContent = taskName;

        let deleteTask = document.createElement('button');
        deleteTask.textContent = 'Delete';
        deleteTask.id = 'deleteTask';
        deleteTask.addEventListener('click', () => {
            listTask.remove();
            tasks = tasks.filter(task => task !== taskName);
        });

        listTask.appendChild(deleteTask);
        document.getElementById('listTask').appendChild(listTask);
        document.getElementById('taskName').value = '';
    }
});
