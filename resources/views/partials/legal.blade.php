<div class="container mt-5">
    <div class="card border-0 shadow-sm">
        <div class="card-body">
            <h5 class="card-title">Documentos Legales</h5>
            <ul class="list-unstyled">
                @php
                use App\Models\Legal;
                @endphp
                @foreach(Legal::latest()->take(3)->get() as $legal)
                <li>
                    <a href="{{ route('legals.show', $legal->id) }}" class="text-decoration-none">
                        {{ $legal->titulo }} (v{{ $legal->version }})
                    </a>
                </li>
                @endforeach
            </ul>
        </div>
    </div>
</div>
