@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <h3 class="mb-0">Documentos Legales</h3>
        </div>
        <div class="card-body">
            <!-- Editor WYSIWYG -->
            <form action="{{ route('legals.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="form-label">Título</label>
                    <input type="text" class="form-control" name="titulo" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Contenido</label>
                    <textarea id="tinyeditor" class="form-control" name="contenido" rows="10"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Guardar</button>
            </form>

            <!-- Previsualización PDF -->
            <div class="mt-5">
                <h4>Vista Previa</h4>
                <iframe id="pdf-preview" class="w-100" height="500" style="border: 1px solid #eee;"></iframe>
            </div>

            <!-- Historial -->
            <div class="mt-5">
                <h4>Historial de Versiones</h4>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Versión</th>
                            <th>Fecha</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($legals as $legal)
                        <tr>
                            <td>{{ $legal->version }}</td>
                            <td>{{ $legal->fecha_publicacion->format('d/m/Y') }}</td>
                            <td>
                                <a href="#" class="btn btn-sm btn-outline-primary">Ver</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<!-- TinyMCE -->
<script src="https://cdn.tiny.cloud/1/TU_API_KEY/tinymce/6/tinymce.min.js"></script>
<script>
    tinymce.init({
        selector: '#tinyeditor',
        plugins: 'lists link image preview',
        toolbar: 'bold italic | link image | bullist numlist',
        content_style: 'body { font-family: Arial, sans-serif; }'
    });

    // Generar PDF preview
    document.querySelector('form').addEventListener('submit', function(e) {
        const content = tinymce.get('tinyeditor').getContent();
        document.getElementById('pdf-preview').srcdoc = content;
    });
</script>
@endpush
