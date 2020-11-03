@extends('adminlte::page')

@section('title', 'Cadastrar Novo Contato')

@section('content_header')
    <h1>Cadastrar Novo Contato</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('contact.store', ['person_id'=>$person_id]) }}" class="form" method="POST">
                @csrf

                @include('admin.pages.contact._partials.form')
            </form>
        </div>
    </div>
@endsection