@extends('layouts.app')

@section('content')
    <div class="container my-5">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white text-center">
                <h1 class="h3">Modifica Progetto</h1>
            </div>
            <div class="card-body p-4">
                <form action="{{ route('admin.projects.update', $project->id) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="name" class="form-label">Nome Progetto: *</label>
                        <input type="text" name="name" class="form-control" value="{{ old('name', $project->name) }}"
                            required>
                    </div>

                    <div class="mb-3">
                        <label for="description" class="form-label">Descrizione: *</label>
                        <textarea name="description" class="form-control" rows="5" required>{{ old('description', $project->description) }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="programming_language" class="form-label">Linguaggi Utilizzati: *</label>
                        <input type="text" name="programming_language" class="form-control"
                            value="{{ old('programming_language', $project->programming_language) }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="img" class="form-label">Immagine (URL):</label>
                        <input type="text" name="img" class="form-control" value="{{ old('img', $project->img) }}">
                    </div>

                    <div class="mb-3">
                        <label for="thumbnail_img" class="form-label">Miniatura (URL):</label>
                        <input type="text" name="thumbnail_img" class="form-control"
                            value="{{ old('thumbnail_img', $project->thumbnail_img) }}">
                    </div>

                    <div class="mb-3">
                        <label for="website_url" class="form-label">Link al Sito: *</label>
                        <input type="url" name="website_url" class="form-control"
                            value="{{ old('website_url', $project->website_url) }}" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100">Aggiorna Progetto</button>
                </form>
            </div>
        </div>
    </div>
@endsection
