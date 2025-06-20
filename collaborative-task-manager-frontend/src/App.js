import React from 'react';
import './App.css'; // You can add some basic styles here
import TaskList from './TaskList';
import AddTaskForm from './AddTaskForm';

function App() {
    return (
        <div className="App">
            <header className="App-header">
                <h1>Collaborative Task Manager</h1>
            </header>
            <main>
                <AddTaskForm />
                <TaskList />
            </main>
        </div>
    );
}

export default App;