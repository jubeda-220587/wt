// Wait for the DOM to be fully loaded before running script
document.addEventListener('DOMContentLoaded', () => {
    // 1. DOM Element Selection
    const taskInput = document.getElementById('taskInput');
    const addTaskBtn = document.getElementById('addTaskBtn');
    const taskList = document.getElementById('taskList');
    const totalTasksEl = document.getElementById('totalTasks');
    const completedTasksEl = document.getElementById('completedTasks');
    const clearCompletedBtn = document.getElementById('clearCompletedBtn');

    // State array to track tasks
    let tasks = [];

    // 2. Event Listeners
    // Add task via button click
    addTaskBtn.addEventListener('click', handleAddTask);
    
    // Add task via enter key (Keyboard Event)
    taskInput.addEventListener('keypress', (e) => {
        if (e.key === 'Enter') {
            handleAddTask();
        }
    });

    // Clear completed tasks
    clearCompletedBtn.addEventListener('click', clearCompletedTasks);

    // 3. Core Functions
    function handleAddTask() {
        const text = taskInput.value.trim();
        
        if (text !== '') {
            // Add to state
            const newTask = {
                id: Date.now().toString(),
                text: text,
                completed: false
            };
            
            tasks.push(newTask);
            
            // Clear input and refocus
            taskInput.value = '';
            taskInput.focus();
            
            // Update UI (DOM Manipulation)
            renderTasks();
        } else {
            // Simple visual feedback for empty input
            taskInput.style.borderColor = 'var(--danger)';
            setTimeout(() => {
                taskInput.style.borderColor = 'var(--border-color)';
            }, 500);
        }
    }

    // Function to render all tasks
    function renderTasks() {
        // Clear current list content
        taskList.innerHTML = '';
        
        let completedCount = 0;

        tasks.forEach(task => {
            if (task.completed) completedCount++;

            // Create list item (DOM Element Creation)
            const li = document.createElement('li');
            li.className = `task-item ${task.completed ? 'completed' : ''}`;
            
            // Create content container
            const contentDiv = document.createElement('div');
            contentDiv.className = 'task-content';
            
            // Toggle completed status on click
            contentDiv.addEventListener('click', () => toggleTaskStatus(task.id));
            
            // Checkbox indicator
            const checkbox = document.createElement('div');
            checkbox.className = 'checkbox';
            
            // Text node
            const textSpan = document.createElement('span');
            textSpan.className = 'task-text';
            textSpan.textContent = task.text;
            
            contentDiv.appendChild(checkbox);
            contentDiv.appendChild(textSpan);
            
            // Delete button
            const deleteBtn = document.createElement('button');
            deleteBtn.className = 'delete-btn';
            deleteBtn.innerHTML = `
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                    <polyline points="3 6 5 6 21 6"></polyline>
                    <path d="M19 6v14a2 2 0 0 1-2 2H7a2 2 0 0 1-2-2V6m3 0V4a2 2 0 0 1 2-2h4a2 2 0 0 1 2 2v2"></path>
                </svg>
            `;
            
            // Event delegation/handling specific target
            deleteBtn.addEventListener('click', (e) => {
                e.stopPropagation(); // Prevent triggering the content click
                deleteTask(task.id);
            });
            
            // Assemble the DOM structure
            li.appendChild(contentDiv);
            li.appendChild(deleteBtn);
            
            // Add to ul
            taskList.appendChild(li);
        });

        // Update statistics (DOM Content Update)
        totalTasksEl.textContent = `Total: ${tasks.length}`;
        completedTasksEl.textContent = `Completed: ${completedCount}`;
        
        // Conditional UI logic
        clearCompletedBtn.style.display = completedCount > 0 ? 'block' : 'none';
        
        // Empty state
        if (tasks.length === 0) {
            const emptyMsg = document.createElement('li');
            emptyMsg.style.textAlign = 'center';
            emptyMsg.style.color = 'var(--text-muted)';
            emptyMsg.style.padding = '20px 0';
            emptyMsg.textContent = 'No tasks yet. Add one above!';
            taskList.appendChild(emptyMsg);
        }
    }

    // Toggle specific task status
    function toggleTaskStatus(id) {
        tasks = tasks.map(task => {
            if (task.id === id) {
                return { ...task, completed: !task.completed };
            }
            return task;
        });
        renderTasks();
    }

    // Delete specific task
    function deleteTask(id) {
        // A simpler way: just update state and re-render
        tasks = tasks.filter(task => task.id !== id);
        renderTasks();
    }

    // Clear all completed tasks
    function clearCompletedTasks() {
        tasks = tasks.filter(task => !task.completed);
        renderTasks();
    }

    // Initial render
    renderTasks();
});
