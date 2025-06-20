import React, { useState, useEffect } from 'react';

function TaskList() {
    const [tasks, setTasks] = useState([]);

    useEffect(() => {
        // Fetch the tasks from our Laravel backend
        fetch('http://127.0.0.1:8000/api/tasks')
            .then(response => response.json())
            .then(data => setTasks(data));
    }, []); // The empty array means this effect runs once when the component loads

    return (
        <div>
            <h2>Task List</h2>
            <ul>
                {tasks.map(task => (
                    <li key={task.id}>{task.title}</li>
                ))}
            </ul>
        </div>
    );
}

export default TaskList;