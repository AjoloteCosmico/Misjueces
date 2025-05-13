@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">Calificar Candidato</h3>
                </div>
                <div class="card-body">
                    <form x-data="votacionForm()" @submit.prevent="submitForm" action="{{ route('votar.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nombre del Candidato</label>
                            <input type="text"
                                   class="form-control"
                                   x-model="nombre"
                                   @input.debounce.300ms="buscarCandidatos"
                                   required>
                            <template x-if="sugerencias.length > 0">
                                <div class="list-group mt-2">
                                    <template x-for="(candidato, index) in sugerencias" :key="index">
                                        <button type="button"
                                                class="list-group-item list-group-item-action"
                                                @click="seleccionarCandidato(candidato)">
                                            <span x-text="candidato.nombre"></span>
                                        </button>
                                    </template>
                                </div>
                            </template>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Puntuación (1-5)</label>
                            <select class="form-select" x-model="puntuacion" name="puntuacion" required>
                                <option value="" disabled selected>Seleccione...</option>
                                <option value="1">⭐ (1) - Mínima</option>
                                <option value="5">⭐⭐⭐⭐⭐ (5) - Máxima</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Comentarios</label>
                            <textarea class="form-control"
                                      x-model="comentarios"
                                      name="comentarios"
                                      maxlength="255"
                                      rows="3"></textarea>
                            <small class="text-muted" x-text="`${255 - comentarios.length} caracteres restantes`"></small>
                        </div>

                        <div class="d-grid">
                            <button type="submit" class="btn btn-primary" :disabled="!formularioValido">
                                <i class="bi bi-check-circle me-1"></i> Enviar Votación
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    function votacionForm() {
        return {
            nombre: '',
            puntuacion: '',
            comentarios: '',
            sugerencias: [],

            get formularioValido() {
                return this.nombre.trim() !== '' &&
                       this.puntuacion !== '' &&
                       this.comentarios.trim() !== '';
            },

            async buscarCandidatos() {
                if (this.nombre.length < 3) {
                    this.sugerencias = [];
                    return;
                }
                const response = await fetch(`/api/candidatos/buscar?q=${this.nombre}`);
                this.sugerencias = await response.json();
            },

            seleccionarCandidato(candidato) {
                this.nombre = candidato.nombre;
                this.sugerencias = [];
            },

            submitForm() {
                if (this.formularioValido) {
                    document.querySelector('form').submit();
                }
            }
        }
    }
</script>
@endpush
