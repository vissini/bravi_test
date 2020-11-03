@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Contatos</h1>
@stop

@section('content')
    <h1><a href="{{ route('contact.create', ['person_id'=>$person_id]) }}" class="btn btn-dark">Novo Contato</a></h1>
    <h1><a href="{{ route('person.index') }}" class="btn btn-dark">Voltar Pessoa</a></h1>
    @include('flash-message')
    <table class="table table-striped">
        <thead>
            <tr>
                <td>Tipo</td>
                <td>Valor</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($contacts as $contact)
            <tr>
                <td>{{ $contact->type }}</td>
                <td>{{ $contact->value }}</td>
                <td style="width:240px;">
                        <a class='btn btn-warning' href=" {{ route('contact.edit',  ['person_id'=>$contact->person_id,'id'=>$contact->id]) }}">Editar</a>
                        <a class='btn btn-danger' href=" {{ route('contact.destroy', ['person_id'=>$contact->person_id,'id'=>$contact->id]) }} " 
                            onclick="event.preventDefault(); if(confirm('Delete Contato?')){document.getElementById('form-contact-delete-{{ $contact->id }}').submit();}"
                        >Deletar</a>
                        <form id="form-contact-delete-{{ $contact->id }}" style="display:none" action="{{ route('contact.destroy', ['person_id'=>$contact->person_id,'id'=>$contact->id]) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
