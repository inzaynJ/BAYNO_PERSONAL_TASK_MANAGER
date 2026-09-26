<!DOCTYPE html>
<html>
<head>
    <title>Edit Task</title>

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>

<body>

<div class="form-container">

    <div class="form-header">
        Edit Task
    </div>

    <div class="form-body">

        <form
            action="{{ route('tasks.update', $task->id) }}"
            method="POST"
        >

            @csrf
            @method('PUT')

            <div class="form-row">

                <div class="form-group">
                    <label>Task Name</label>

                    <input
                        type="text"
                        name="task_name"
                        value="{{ $task->task_name }}"
                        required
                    >
                </div>

                <div class="form-group">
                    <label>Description</label>

                    <textarea
                        name="description"
                        required
                    >{{ $task->description }}</textarea>
                </div>

            </div>

            <div class="form-row">

                <div class="form-group">
                    <label>Status</label>

                    <select name="status">

                        <option value="Pending"
                            {{ $task->status == 'Pending' ? 'selected' : '' }}>
                            Pending
                        </option>

                        <option value="Ongoing"
                            {{ $task->status == 'Ongoing' ? 'selected' : '' }}>
                            Ongoing
                        </option>

                        <option value="Completed"
                            {{ $task->status == 'Completed' ? 'selected' : '' }}>
                            Completed
                        </option>

                    </select>
                </div>

                <div class="form-group">
                    <label>Due Date</label>

                    <input
                        type="date"
                        name="due_date"
                        value="{{ $task->due_date }}"
                        required
                    >
                </div>

            </div>

            <div class="form-buttons">

                <button
                    type="submit"
                    class="submit-button"
                >
                    Save Changes
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