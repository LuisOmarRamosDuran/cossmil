@component('mail::message')
# Cambiar contraseña

Cambio de contraseña

@component('mail::button', ['url' => 'http://cossmil.org:82/cambiar-contrasena'])
Presione para restablecer su contraseña
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
