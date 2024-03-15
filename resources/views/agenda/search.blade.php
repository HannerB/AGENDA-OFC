@extends('theme.base')

@section('content')
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="{{ route('agenda.index') }}">Agenda <svg xmlns="http://www.w3.org/2000/svg"
                    width="16" height="16" fill="currentColor" class="bi bi-journal" viewBox="0 0 16 16">
                    <path
                        d="M3 0h10a2 2 0 1 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2" />
                    <path
                        d="M1 5v-.5a.5.5 0 0 1 1 0V5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0V8h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1zm0 3v-.5a.5.5 0 0 1 1 0v.5h.5a.5.5 0 0 1 0 1h-2a.5.5 0 0 1 0-1z" />
                </svg></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="{{ route('agenda.index') }}"> Agregar <svg
                                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                class="bi bi-plus-circle-fill" viewBox="0 0 16 16">
                                <path
                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0M8.5 4.5a.5.5 0 0 0-1 0v3h-3a.5.5 0 0 0 0 1h3v3a.5.5 0 0 0 1 0v-3h3a.5.5 0 0 0 0-1h-3z" />
                            </svg></a>
                    </li>
                </ul>
                <form class="d-flex" role="search" action="{{ route('agenda.search') }}" method="GET">
                    <input class="form-control me-2" type="text" name="query" placeholder="Buscar...">
                    <button class="btn btn-outline-success" type="submit">Search</button>
                </form>
            </div>
        </div>
    </nav>

    <header>


    </header>

    <main role="main">
        <section class="jumbotron text-center">
            <div class="container">
                <h1 id="title">Listado de Contactos</h1>
                <p>
                    <a href="{{ route('agenda.index') }}" class="btn btn-primary my-2">Agenda</a>
                </p>
            </div>
        </section>
        <!-- Mostrar los resultados según el diseño deseado -->

        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row">

                    @php
                        // Ordenar los resultados alfabéticamente por el nombre
                        $results = $results->sortBy('name');
                    @endphp

                    @php
                        $prevFirstLetter = '';
                    @endphp

                    @foreach ($results as $result)
                        <!-- Agrupar resultados por la primera letra del nombre -->
                        @php
                            $firstLetter = strtoupper(substr($result->name, 0, 1));
                        @endphp

                        <!-- Mostrar encabezado para cada grupo de resultados -->
                        @if ($firstLetter !== $prevFirstLetter)
                            <div class="col-md-12">
                                <h2>{{ $firstLetter }}</h2>
                            </div>
                        @endif

                        <!-- Mostrar detalles del contacto -->
                        <div class="col-md-4">
                            <a href="{{ route('agenda.show', $result->id) }}"
                                class="card-link text-decoration-none text-dark">
                                <div class="card mb-4 shadow-sm">
                                    <div class="card-body d-flex justify-content-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="36" height="36"
                                            fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
                                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                                            <path fill-rule="evenodd"
                                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                                        </svg>
                                    </div>

                                    <div class="card-body">
                                        <p class="card-text">
                                            <label>Nombre</label>
                                        <p class="text-muted">{{ $result->name }}</p>
                                        <label>Télefono</label>
                                        <p class="text-muted">{{ $result->phone }}</p>
                                        <label>Segundo Teléfono</label>
                                        <p class="text-muted">{{ $result->secondPhone }}</p>
                                        <label>Dirección</label>
                                        <p class="text-muted">{{ $result->address }}</p>
                                        <label>Correo Electrónico</label>
                                        <p class="text-muted">{{ $result->email }}</p>
                                        </p>
                            </a>

                            <div class="d-flex justify-content-between align-items-center">
                                <div class="btn-group">
                                    <button onclick="window.location='{{ route('agenda.edit', $result->id) }}'"
                                        type="button" class="btn btn-sm btn-outline-secondary">
                                        Editar
                                    </button>
                                </div>
                                <small class="text-muted">{{ $result->created_at->format('d/m/Y H:i:s') }}</small>
                            </div>
                        </div>
                </div>
            </div>



            <!-- Almacenar la primera letra actual para la próxima iteración -->
            @php
                $prevFirstLetter = $firstLetter;
            @endphp
            @endforeach

        </div>
        </div>
        </div>

    </main>

    <footer class="text-muted">

    </footer>
@endsection
