@extends('layouts.app')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow" style="padding: 2.3vw">
                <div class="card-header bg-primary text-white">
                    <h3 class="mb-0">Calificar Candidato</h3>
                </div>
                @if($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
                <div class="card-body" >
                    <form  @submit.prevent="submitForm" action="{{ route('votar.store') }}" method="POST">
                        @csrf
                        <div class="mb-3" >
                            <label class="form-label" >Nombre del Candidato</label>
                            <input type="text"
                                   id="candidato_name"
                                    name="nombre"
                                   class="form-control"
                                   required>
                            
                                <div class="list-group mt-2 resultados-div" id="resultados" ></div>
                                  
                                        
                                
                                </div>
                         
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Puntuación (1-5)</label>
                            <select class="form-control form-select"  name="puntuacion" required>
                                <option value="" disabled selected>Seleccione...</option>
                                <option value="1">⭐ (1) - Mínima</option>
                                <option value="2">⭐⭐ (2)  </option>
                                <option value="3">⭐⭐⭐ (3) </option>
                                <option value="4">⭐⭐⭐⭐ (4) </option>
                                <option value="5">⭐⭐⭐⭐⭐ (5) - Máxima</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Comentarios</label>
                            <textarea class="form-control"
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

@push('js')

<script>
function setValueWithEffect(element, value) {
  // Quitar la clase si ya existe
  element.classList.remove('highlight');
  
  // Forzar reinicio de la animación (truco de reflow)
  void element.offsetWidth;
  
  // Asignar el nuevo valor
  element.value = value;
  
  // Aplicar el efecto
  element.classList.add('highlight');
}
 const searchBox = document.getElementById('candidato_name');
const resultadosDiv = document.getElementById('resultados');

searchBox.addEventListener('input', function(e) {
    const searchTerm = e.target.value;
    
    if (searchTerm.length < 2) {
        resultadosDiv.innerHTML = '';
        return;
    }

    // Enviar solicitud AJAX
    fetch(`search_name?q=${encodeURIComponent(searchTerm)}`)
        .then(response => response.json())
        .then(data => {
            resultadosDiv.innerHTML = '';
            data.forEach(item => {
                resultadosDiv.innerHTML += `<button type="button" class="list-group-item list-group-item-action" onclick="rellenar('${item.nombre}')"> <span > ${item.nombre} </span> </button>`;
            });
        })
        .catch(error => console.error('Error:', error));
});

function rellenar(nombre){

    // document.getElementById('ncr2').value=nombre;
    // document.getElementById('ncr3').value=sector;
    // document.getElementById('ncr4').value=giro;
    // document.getElementById('giro_especifico').value=giro_esp;

    setValueWithEffect(document.getElementById('candidato_name'), nombre);
    console.log('se ha seleccionado un candidato',nombre);
    resultadosDiv.innerHTML = '';
}
</script>
@endpush
