<!DOCTYPE html>
<html>
<head>
    <title>Personal Task Manager</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

<div class="container">

    <h1>Hello!</h1>

    <p class="subtitle">
        Stay organized and get things done.
    </p>

    <a href="{{ route('tasks.create') }}" class="add-task-button">
        + Add New Task
    </a>

    <div class="task-header">
        <h2>My Tasks</h2>
    </div>

    @if($tasks->count() > 0)

        @foreach($tasks as $task)

            <div class="task-card">

                <div class="task-top">

                    <div>
                        <h3 class="task-name">
                            {{ $task->task_name }}
                        </h3>

                        <p class="description">
                            {{ $task->description }}
                        </p>
                    </div>

                    <div class="action-buttons">

                        <a
                            href="{{ route('tasks.edit', $task->id) }}"
                            class="edit-button"
                        >
                            Edit
                        </a>

                        <form
                            action="{{ route('tasks.destroy', $task->id) }}"
                            method="POST"
                        >
                            @csrf
                            @method('DELETE')

                            <button
                                type="submit"
                                class="delete-button"
                                onclick="return confirm('Are you sure you want to delete this task?')"
                            >
                                Delete
                            </button>
                        </form>

                    </div>

                </div>

                <div class="task-info">

                    <span class="status
                        @if($task->status == 'Pending')
                            pending
                        @elseif($task->status == 'Ongoing')
                            ongoing
                        @else
                            completed
                        @endif
                    ">
                        {{ $task->status }}
                    </span>

                    <span>
                        📅 {{ $task->due_date }}
                    </span>

                </div>

            </div>

        @endforeach

    @else

        <div class="no-tasks">
            No tasks found. Click "Add New Task" to create one.
        </div>

    @endif

</div>

</body>
</html>