@component('mail::message')
# Cambiar contraseña

Cambio de contraseña

@component('mail::button', ['url' => 'http://cossmil.test/cambiar-contrasena/'.$id_user])
Presione para restablecer su contraseña
@endcomponent

Gracias,<br>
{{ config('app.name') }}
@endcomponent
