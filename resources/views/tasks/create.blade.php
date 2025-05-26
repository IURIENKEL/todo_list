@extends('layouts.app')

@section('content')
  <div class="card">
    <div class="card-header">Nova Tarefa</div>
    <div class="card-body">
      <form action="{{ route('tasks.store') }}" method="POST">
        @csrf

        <div class="mb-3">
          <label for="title" class="form-label">Título</label>
          <input type="text" name="title" id="title"
                 class="form-control @error('title') is-invalid @enderror"
                 value="{{ old('title') }}" required>
          @error('title')
            <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>

        <div class="mb-3">
          <label for="description" class="form-label">Descrição</label>
          <textarea name="description" id="description"
                    class="form-control">{{ old('description') }}</textarea>
        </div>

        <button type="submit" class="btn btn-success">Salvar</button>
        <a href="{{ route('tasks.index') }}" class="btn btn-secondary">Cancelar</a>
      </form>
    </div>
  </div>
@endsection
