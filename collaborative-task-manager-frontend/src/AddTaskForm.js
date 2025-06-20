import React, { useState } from 'react';

function AddTaskForm() {
    const [title, setTitle] = useState('');

    const handleSubmit = (event) => {
        event.preventDefault(); // Prevents the page from reloading on form submission

        // Send the new task to our Laravel backend
        fetch('http://127.0.0.1:8000/api/tasks', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({
                title: title,
                project_id: 1, // For simplicity, we'll hardcode this for now
                user_id: 1,    // And this
            }),
        })
        .then(response => response.json())
        .then(data => {
            console.log('Task created:', data);
            setTitle(''); // Clear the input field after the task is created
        });
    };

    return (
        <form onSubmit={handleSubmit}>
            <h3>Add a New Task</h3>
            <input
                type="text"
                value={title}
                onChange={(e) => setTitle(e.target.value)}
                placeholder="Task title"
            />
            <button type="submit">Add Task</button>
        </form>
    );
}

export default AddTaskForm;