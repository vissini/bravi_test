@extends('adminlte::page')

@section('title', 'Cadastrar Novo Plano')

@section('content_header')
    <h1>Cadastrar Nova Pessoa</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('person.store') }}" class="form" method="POST">
                @csrf

                @include('admin.pages.person._partials.form')
            </form>
        </div>
    </div>
@endsection