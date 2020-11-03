@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Pessoas</h1>
@stop

@section('content')
    <h1><a href="{{ route('person.create') }}" class="btn btn-dark">Nova Pessoa</a></h1>
    @include('flash-message')
    <table class="table table-striped">
        <thead>
            <tr>
                <td>Nome</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
            @foreach ($people as $person)
            <tr>
                <td>{{ $person->name }}</td>
                <td style="width:240px;">
                        <a class='btn btn-warning' href=" {{ route('person.edit',  ['id'=>$person->id]) }}">Editar</a>
                        <a class='btn btn-danger' href=" {{ route('person.destroy', ['id'=>$person->id]) }} " 
                            onclick="event.preventDefault(); if(confirm('Delete Person?')){document.getElementById('form-person-delete-{{ $person->id }}').submit();}"
                        >Deletar</a>
                        <form id="form-person-delete-{{ $person->id }}" style="display:none" action="{{ route('person.destroy', ['id'=>$person->id]) }}" method="POST">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                        </form>
                        <a class='btn btn-primary' href=" {{ route('contact.index', ['person_id' => $person->id]) }}"> Contato </a>
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
