<!DOCTYPE html>
<html>
<head>
    <title>Add Task</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

<div class="form-container">

    <div class="form-header">
        + Add New Task
    </div>

    <div class="form-body">

        <form action="{{ route('tasks.store') }}" method="POST">

            @csrf

            <div class="form-row">

                <div class="form-group">
                    <label>Task Name</label>

                    <input
                        type="text"
                        name="task_name"
                        placeholder="Task name"
                        required
                    >
                </div>

                <div class="form-group">
                    <label>Description</label>

                    <textarea
                        name="description"
                        placeholder="Description"
                        required
                    ></textarea>
                </div>

            </div>

            <div class="form-row">

                <div class="form-group">
                    <label>Status</label>

                    <select name="status">

                        <option value="Pending">
                            Pending
                        </option>

                        <option value="Ongoing">
                            Ongoing
                        </option>

                        <option value="Completed">
                            Completed
                        </option>

                    </select>
                </div>

                <div class="form-group">
                    <label>Due Date</label>

                    <input
                        type="date"
                        name="due_date"
                        required
                    >
                </div>

            </div>

            <div class="form-buttons">

                <button
                    type="submit"
                    class="submit-button"
                >
                    + Add Task
                </button>

                <a
                    href="{{ route('tasks.index') }}"
                    class="cancel-button"
                >
                    Cancel
                </a>

            </div>

        </form>

    </div>

</div>

</body>
</html>