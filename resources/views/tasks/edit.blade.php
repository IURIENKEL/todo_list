@extends('layouts.app')

@section('content')
  <div class="card">
    <div class="card-header">Editar Tarefa</div>
    <div class="card-body">
      <form action="{{ route('tasks.update', $task) }}" method="POST">
        @csrf
        @method('PATCH')

        <div class="mb-3">
          <label for="title" class="form-label">Título</label>
          <input type="text" name="title" id="title"
                 class="form-control @error('title') is-invalid @enderror"
                 value="{{ old('title', $task->title) }}" required>
          @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="description" class="form-label">Descrição</label>
          <textarea name="description" id="description"
                    class="form-control">{{ old('description', $task->description) }}</textarea>
        </div>

        <div class="form-check mb-3">
          <input type="hidden" name="is_done" value="0">
          <input class="form-check-input" type="checkbox" name="is_done" value="1"
                 id="is_done" {{ old('is_done', $task->is_done) ? 'checked' : '' }}>
          <label class="form-check-label" for="is_done">Concluída</label>
        </div>

        <button type="submit" class="btn btn-primary">Atualizar</button>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancelar</a>
      </form>
    </div>
  </div>
@endsection
