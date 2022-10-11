@component('mail::message')
# Cambiar contraseña

Cambio de contraseña

@component('mail::button', ['url' => 'http://127.0.0.1:8000/cambiar-contrasena/'.$id_user])
Presione para restablecer su contraseña
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
