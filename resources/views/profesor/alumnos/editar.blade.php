@extends('profesor.layout')

@section('content')
    <div style="display: flex; align-items: center; justify-content: space-between; gap: 1rem; flex-wrap: wrap;">
        <h1 style="margin: 0;">Editar Alumno</h1>
        <a href="{{ route('alumnos.index') }}" class="btn btn-secondary">Volver</a>
    </div>

    <form action="{{ route('alumnos.update', $alumno->id_usuario) }}" method="POST">
        @csrf
        @method('PUT')

        <label>Nombre:</label>
        <input type="text" name="nombre" value="{{ old('nombre', $alumno->nombre) }}" required>
        @error('nombre')
            <div class="muted" style="color:#b91c1c; margin-top:-0.5rem; margin-bottom:0.75rem;">{{ $message }}</div>
        @enderror

        <label>Apellido Paterno:</label>
        <input type="text" name="apellidos_p" value="{{ old('apellidos_p', $alumno->apellidos_p) }}" required>
        @error('apellidos_p')
            <div class="muted" style="color:#b91c1c; margin-top:-0.5rem; margin-bottom:0.75rem;">{{ $message }}</div>
        @enderror

        <label>Apellido Materno:</label>
        <input type="text" name="apellidos_m" value="{{ old('apellidos_m', $alumno->apellidos_m) }}">

        <label>Matrícula:</label>
        <input type="text" name="matricula" value="{{ old('matricula', $alumno->matricula) }}" required>
        @error('matricula')
            <div class="muted" style="color:#b91c1c; margin-top:-0.5rem; margin-bottom:0.75rem;">{{ $message }}</div>
        @enderror

        <label>Email:</label>
        <input type="email" name="email" value="{{ old('email', $alumno->email) }}" required>
        @error('email')
            <div class="muted" style="color:#b91c1c; margin-top:-0.5rem; margin-bottom:0.75rem;">{{ $message }}</div>
        @enderror

        <label>Contraseña (Dejar en blanco para mantener):</label>
        <input type="password" name="password" placeholder="Nueva contraseña">

        @if($inscripcion)
            <hr style="margin: 1rem 0;">
            <p class="muted">Servicio actual: <strong>{{ $inscripcion->servicio->nombre ?? 'N/A' }}</strong>
                ({{ $inscripcion->tipo_servicio }} · {{ $inscripcion->estado_servicio }})
            </p>
        @endif

        <div style="display: flex; gap: 0.75rem; flex-wrap: wrap; margin-top: 1rem;">
            <button type="submit" class="btn">Actualizar</button>
            <a href="{{ route('alumnos.index') }}" class="btn btn-secondary">Volver</a>
        </div>
    </form>
@endsection