@component('mail::message')
 <p> Olá {{ $name }} </p>
 <p> Você se candidatou para a vaga de  {{ $office }} pelo ip {{ $ip }} às {{ $created_at }} através do email {{$email}} </p>
 <p> Sua escolaridade é {{$education_level}},  suas observações {{$observation}}.</p>
@component('mail::panel')
  Ficamos muito felizes com seu interesse em nossa vaga.
@endcomponent
 Obrigado,  {{ config('app.name') }}
@endcomponent