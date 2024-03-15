@extends('theme.base')

@section('content')
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="">Agenda <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                    fill="currentColor" class="bi bi-journal" viewBox="0 0 16 16">
                    <path
                        d="M3 0h10a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2v-1h1v1a1 1 0 0 0 1 1h10a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1H3a1 1 0 0 0-1 1v1H1V2a2 2 0 0 1 2-2" />
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
                        <a class="nav-link active" aria-current="page" href="{{ route('agenda.search') }}">Listado</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container py-5 text-center">
        <h1>Contactos </h1>
        <a href="{{ route('agenda.create') }}" class="btn btn-primary" style="margin-bottom: 10px">Crear Contacto <svg
                xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                class="bi bi-person-add" viewBox="0 0 16 16">
                <path
                    d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7m.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0m-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0M8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4" />
                <path
                    d="M8.256 14a4.5 4.5 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10q.39 0 .74.025c.226-.341.496-.65.804-.918Q8.844 9.002 8 9c-5 0-6 3-6 4s1 1 1 1z" />
            </svg></a>


        @if (Session::has('mensaje'))
            <div class="alert alert-info my-5">
                {{ session::get('mensaje') }}
            </div>
        @endif



        <table class="table table-bordered table-hover">
            <thead>
                <th>Nombre</th>
                <th>Teléfono</th>
                <th>Segundo Teléfono</th>
                <th>Dirección</th>
                <th>Correo</th>
                <th>Acciones</th>
            </thead>

            <tbody>
                @forelse ($agendas as $detail)
                    <tr>
                        <td>{{ $detail->name }}</td>
                        <td>{{ $detail->phone }}</td>
                        <td>{{ $detail->secondPhone }}</td>
                        <td>{{ $detail->address }}</td>
                        <td>{{ $detail->email }}</td>
                        <td>
                            <a href="{{ route('agenda.edit', $detail) }}" class="btn btn-warning">Editar <svg
                                    xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                    class="bi bi-pencil-square" viewBox="0 0 16 16">
                                    <path
                                        d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z" />
                                    <path fill-rule="evenodd"
                                        d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5z" />
                                </svg></a>

                            <form action="{{ route('agenda.destroy', $detail) }}" method="post" class="d-inline">
                                @method('DELETE')
                                @csrf
                                {{-- <button type="submit" class="btn btn-danger">Eliminar <svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-person-dash-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M11 7.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5" />
                                        <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                    </svg></button> --}}
                                <button type="submit" class="btn btn-danger"
                                    onclick="return confirm('Estás seguro de Eliminar este Contacto')">Eliminar <svg
                                        xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                                        class="bi bi-person-dash-fill" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M11 7.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5" />
                                        <path d="M1 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                    </svg></button>
                            </form>
                        </td>
                    </tr>


                @empty
                    <tr>
                        <td colspan="6">No Hay Registros</td>
                    </tr>
                @endforelse
            </tbody>
        </table>


        @if ($agendas->count())
            {{ $agendas->links() }}
        @endif
    </div>
@endsection
