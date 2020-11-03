@extends('adminlte::page')

@section('title', "Editar Contato")

@section('content_header')
    <h1>Editar Contato</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('contact.update', ['person_id'=>$contact->person_id, 'id'=>$contact->id]) }}" class="form" method="POST">
                @csrf
                @method('PUT')

                @include('admin.pages.contact._partials.form')
            </form>
        </div>
    </div>
@endsection