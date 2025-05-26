@extends('layouts.app')

@section('content')
  <div class="d-flex justify-content-between align-items-center mb-3">
    <h1 class="h3">Minhas Tarefas</h1>
    <a href="{{ route('tasks.create') }}" class="btn btn-success">
      <i class="bi bi-plus-lg"></i> Nova Tarefa
    </a>
  </div>

  <div class="card">
    <div class="card-body p-0">
      <ul class="list-group list-group-flush">
        @foreach($tasks as $task)
          <li class="list-group-item d-flex align-items-center justify-content-between">
            <div class="form-check">
              <form action="{{ route('tasks.update', $task) }}" method="POST" class="d-inline">
                @csrf @method('PATCH')
                <input class="form-check-input me-2" type="checkbox" name="is_done" value="1"
                  onchange="this.form.submit()" {{ $task->is_done ? 'checked' : '' }}>
              </form>
              <label class="form-check-label {{ $task->is_done ? 'text-decoration-line-through text-muted' : '' }}">
                {{ $task->title }}
              </label>
            </div>

            <div>
              <a href="{{ route('tasks.edit', $task) }}" class="btn btn-sm btn-primary">
                <i class="bi bi-pencil-fill"></i>
              </a>
              <form action="{{ route('tasks.destroy', $task) }}" method="POST" class="d-inline">
                @csrf @method('DELETE')
                <button class="btn btn-sm btn-danger">
                  <i class="bi bi-trash-fill"></i>
                </button>
              </form>
            </div>
          </li>
        @endforeach
      </ul>
    </div>
  </div>
@endsection
