@extends('theme.base')

@section('content')
    <div class="container py-5 text-center">
        <h1>Agenda</h1>
        <a href="{{ route('agenda.index') }}" class="btn btn-primary">Entrar</a>
    </div>
@endsection
