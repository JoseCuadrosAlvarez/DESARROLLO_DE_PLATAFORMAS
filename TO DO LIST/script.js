document.addEventListener('DOMContentLoaded', () => {
    // Se obtiene el botón para completar todas las tareas
    const completarTodo = document.querySelector('#completar-todo');
    // Se obtiene el botón para deseleccionar todas las tareas
    const deselectTodo = document.querySelector('#deseleccionar-todo');
    // Se obtiene el elemento de la lista de tareas
    const taskList = document.querySelector('#task-list');
    // Se obtiene el campo de entrada para nuevas tareas
    const taskInput = document.querySelector('#task-input');
    
    // Se añade un evento click al botón completarTodo
    completarTodo.addEventListener('click', () => {
        // Se obtienen todos los elementos <li> dentro de la lista de tareas
        const taskItems = taskList.querySelectorAll('li');

        // Se recorre cada elemento <li>
        taskItems.forEach((item) => {
            // Se obtiene el checkbox dentro del <li>
            const checkbox = item.querySelector('input[type="checkbox"]');
            // Si el checkbox existe, se marca como completado
            if (checkbox) {
                checkbox.checked = true;
            }
        });
    });

    // Se añade un evento click al botón deselectTodo
    deselectTodo.addEventListener('click', () => {
        // Se obtienen todos los elementos <li> dentro de la lista de tareas
        const taskItems = taskList.querySelectorAll('li');

        // Se recorre cada elemento <li>
        taskItems.forEach((item) => {
            // Se obtiene el checkbox dentro del <li>
            const checkbox = item.querySelector('input[type="checkbox"]');
            // Si el checkbox existe, se desmarca
            if (checkbox) {
                checkbox.checked = false;
            }
        });
    });

    // Se añade un evento submit al formulario de nueva tarea
    document.querySelector('#new-task').addEventListener('submit', (event) => {
        // Se previene la acción por defecto del formulario (recargar la página)
        event.preventDefault();

        // Se obtiene el valor de la nueva tarea y se elimina cualquier espacio en blanco
        const taskValue = taskInput.value.trim();
        // Si el valor de la tarea está vacío, se sale de la función
        if (taskValue === "")
            return;

        // Se crea un nuevo elemento checkbox
        const cb = document.createElement('input');
        cb.setAttribute('type', 'checkbox');
        
        // Se crea un nuevo elemento <li> para la tarea
        const li = document.createElement('li');
        // Se añade el checkbox al <li>
        li.appendChild(cb);
        // Se añade el texto de la tarea al <li>
        li.innerHTML += " " + taskValue;

        // Se añade el <li> a la lista de tareas
        taskList.append(li);

        // Se crea un botón para eliminar la tarea
        const deleteButton = document.createElement('button');
        // Se establece el texto del botón como una "X"
        deleteButton.innerText = '✘';
        // Se añade una clase al botón para estilos
        deleteButton.classList.add('delete-button');
        // Se añade un evento click al botón para eliminar la tarea
        deleteButton.addEventListener('click', () => {
            li.remove();
        });
        // Se añade el botón de eliminar al <li>
        li.appendChild(deleteButton);

        // Se limpia el campo de entrada de tareas y se enfoca de nuevo para una nueva entrada
        taskInput.value = '';
        taskInput.focus();
    });
});
