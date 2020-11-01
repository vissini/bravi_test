@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Exercício 1</h1>
@stop

@section('content')
    @include('flash-message')
    <form method="POST" action="{{route('balancedBracket.checkBrackets')}}">
        @csrf
        <div class="form-group">
            <label for="balanced_bracket">Check Brackts</label>
            <input type="text" name="balanced_bracket" class="form-control" id="balanced_bracket" placeholder="{}()[]">
        </div>
        <button type="submit" class="btn btn-primary">Check</button>
    </form>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
