@extends('adminlte::page')

@section('title', "Editar a Pessoa {$person->name}")

@section('content_header')
    <h1>Editar a Pessoa {{ $person->name }}</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('person.update', $person->id) }}" class="form" method="POST">
                @csrf
                @method('PUT')

                @include('admin.pages.person._partials.form')
            </form>
        </div>
    </div>
@endsection