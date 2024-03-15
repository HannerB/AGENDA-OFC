@extends('theme.base')

@section('content')
    <div class="container py-5">
        <div class="d-flex justify-content-center align-items-center"> <!-- Contenedor centrado -->
            <div class="card col-xs-12 col-sm-6 col-md-6 col-lg-4 p-4">
                @if (isset($agenda))
                    <h1 class="text-center">Editar Contacto</h1>
                @else
                    <h1 class="text-center">Guardar Contacto</h1>
                @endif

                @if (isset($agenda))
                    <form action="{{ route('agenda.update', $agenda) }}" method="post">
                        @method('PUT')
                    @else
                        <form action="{{ route('agenda.store') }}" method="post">
                @endif
                @csrf

                <section class="d-flex justify-content-center align-items-center">
                    <div class="mb-4 d-flex justify-content-start align-items-center">

                    </div>
                    <div class="mb-1">

                        <div class="mb-4 d-flex justify-content-between">
                            <div style="margin-right: 10px">
                                <label for="name" class="form-label"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="18" height="18" fill="currentColor" class="bi bi-person"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z" />
                                    </svg> Nombre</label>
                                <input type="text" name="name" class="form-control"
                                    value="{{ old('name') ?? @$agenda->name }}">
                                <p class="form-text" style="text-align: center">Ingrese el Nombre</p>
                                @error('name')
                                    <p class="form-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="phone" class="form-label"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="16" height="16" fill="currentColor" class="bi bi-telephone"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z" />
                                    </svg> Móvil</label>
                                <input type="number" name="phone" class="form-control"
                                    value="{{ old('phone') ?? @$agenda->phone }}">
                                <p class="form-text" style="text-align: center">Ingrese el Número</p>
                                @error('phone')
                                    <p class="form-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>

                        <div class="mb-4 d-flex justify-content-between">
                            <div style="margin-right: 10px">
                                <label for="secondPhone" class="form-label"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="16" height="16" fill="currentColor" class="bi bi-telephone"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M3.654 1.328a.678.678 0 0 0-1.015-.063L1.605 2.3c-.483.484-.661 1.169-.45 1.77a17.6 17.6 0 0 0 4.168 6.608 17.6 17.6 0 0 0 6.608 4.168c.601.211 1.286.033 1.77-.45l1.034-1.034a.678.678 0 0 0-.063-1.015l-2.307-1.794a.68.68 0 0 0-.58-.122l-2.19.547a1.75 1.75 0 0 1-1.657-.459L5.482 8.062a1.75 1.75 0 0 1-.46-1.657l.548-2.19a.68.68 0 0 0-.122-.58zM1.884.511a1.745 1.745 0 0 1 2.612.163L6.29 2.98c.329.423.445.974.315 1.494l-.547 2.19a.68.68 0 0 0 .178.643l2.457 2.457a.68.68 0 0 0 .644.178l2.189-.547a1.75 1.75 0 0 1 1.494.315l2.306 1.794c.829.645.905 1.87.163 2.611l-1.034 1.034c-.74.74-1.846 1.065-2.877.702a18.6 18.6 0 0 1-7.01-4.42 18.6 18.6 0 0 1-4.42-7.009c-.362-1.03-.037-2.137.703-2.877z" />
                                    </svg> Móvil ·2</label>
                                <input type="number" name="secondPhone" class="form-control"
                                    value="{{ old('secondPhone') ?? @$agenda->secondPhone }}">
                                <p class="form-text" style="text-align: center">Ingrese segundo Número</p>
                                @error('secondPhone')
                                    <p class="form-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div>
                                <label for="address" class="form-label"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="16" height="16" fill="currentColor" class="bi bi-geo-alt"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M12.166 8.94c-.524 1.062-1.234 2.12-1.96 3.07A32 32 0 0 1 8 14.58a32 32 0 0 1-2.206-2.57c-.726-.95-1.436-2.008-1.96-3.07C3.304 7.867 3 6.862 3 6a5 5 0 0 1 10 0c0 .862-.305 1.867-.834 2.94M8 16s6-5.686 6-10A6 6 0 0 0 2 6c0 4.314 6 10 6 10" />
                                        <path d="M8 8a2 2 0 1 1 0-4 2 2 0 0 1 0 4m0 1a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                    </svg> Dirección</label>
                                <input type="text" name="address" class="form-control"
                                    value="{{ old('address') ?? @$agenda->address }}">
                                <p class="form-text" style="text-align: center">Ingrese su Dirección</p>
                                @error('address')
                                    <p class="form-text text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>


                        <div class="mb-4">
                            <label for="email" class="form-label"><svg xmlns="http://www.w3.org/2000/svg" width="16"
                                    height="16" fill="currentColor" class="bi bi-envelope-at" viewBox="0 0 16 16">
                                    <path
                                        d="M2 2a2 2 0 0 0-2 2v8.01A2 2 0 0 0 2 14h5.5a.5.5 0 0 0 0-1H2a1 1 0 0 1-.966-.741l5.64-3.471L8 9.583l7-4.2V8.5a.5.5 0 0 0 1 0V4a2 2 0 0 0-2-2zm3.708 6.208L1 11.105V5.383zM1 4.217V4a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v.217l-7 4.2z" />
                                    <path
                                        d="M14.247 14.269c1.01 0 1.587-.857 1.587-2.025v-.21C15.834 10.43 14.64 9 12.52 9h-.035C10.42 9 9 10.36 9 12.432v.214C9 14.82 10.438 16 12.358 16h.044c.594 0 1.018-.074 1.237-.175v-.73c-.245.11-.673.18-1.18.18h-.044c-1.334 0-2.571-.788-2.571-2.655v-.157c0-1.657 1.058-2.724 2.64-2.724h.04c1.535 0 2.484 1.05 2.484 2.326v.118c0 .975-.324 1.39-.639 1.39-.232 0-.41-.148-.41-.42v-2.19h-.906v.569h-.03c-.084-.298-.368-.63-.954-.63-.778 0-1.259.555-1.259 1.4v.528c0 .892.49 1.434 1.26 1.434.471 0 .896-.227 1.014-.643h.043c.118.42.617.648 1.12.648m-2.453-1.588v-.227c0-.546.227-.791.573-.791.297 0 .572.192.572.708v.367c0 .573-.253.744-.564.744-.354 0-.581-.215-.581-.8Z" />
                                </svg> Correo Electrónico</label>
                            <input type="email" name="email" class="form-control"
                                value="{{ old('email') ?? @$agenda->email }}" required>

                            <p class="form-text" style="text-align: center">Ingrese el Correo</p>
                            @error('email')
                                <p class="form-text text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </section>

                <!-- Resto del formulario sigue el mismo patrón -->

                <div class="text-center"> <!-- Contenedor centrado para botones -->
                    <button style="margin-top:10px" type="submit" class="btn btn-success">
                        @if (isset($agenda))
                            Editar Contacto
                        @else
                            Guardar Contacto
                        @endif
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-person-circle" viewBox="0 0 16 16">
                            <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0" />
                            <path fill-rule="evenodd"
                                d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8m8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1" />
                        </svg>
                    </button>

                    <div style="margin-top: 10px;">
                        <a href="{{ route('agenda.search') }}" class="btn btn-secondary">Cancelar</a>
                    </div>
                </div>
                </form>
            </div>
        </div>
    </div>
@endsection
