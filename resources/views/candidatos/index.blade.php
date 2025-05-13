@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="card shadow">
        <div class="card-header bg-primary text-white">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="mb-0">Listado de Candidatos</h3>
                <a href="{{ route('candidatos.create') }}" class="btn btn-light">
                    <i class="bi bi-plus-circle me-1"></i>Agregar Calificación
                </a>
            </div>
        </div>
        <div class="card-body">
            <table id="candidatosTable" class="table table-striped table-hover w-100">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Partido</th>
                        <th>Votos</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($candidatos as $candidato)
                    <tr>
                        <td>{{ $candidato->nombre }}</td>
                        <td>{{ $candidato->partido ?? 'N/A' }}</td>
                        <td>{{ $candidato->votaciones_count }}</td>
                        <td>
                            <a href="{{ route('candidatos.show', $candidato->id) }}"
                               class="btn btn-sm btn-outline-primary">
                                <i class="bi bi-eye"></i> Ver
                            </a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    $(document).ready(function() {
        $('#candidatosTable').DataTable({
            responsive: true,
            language: {
                url: '//cdn.datatables.net/plug-ins/1.13.4/i18n/es-ES.json'
            }
        });
    });
</script>
@endpush
