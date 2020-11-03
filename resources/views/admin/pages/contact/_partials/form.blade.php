@include('flash-message')

<div class="form-group">
    <label>Tipo:</label>
    <select name="type" id="type">
        <option value="email">E-mail</option>
        <option value="telefone">Telefone</option>
        <option value="whatsapp">Whatsapp</option>
    </select>
</div>
<div class="form-group">
    <label>Valor:</label>
    <input type="text" name="value" class="form-control" placeholder="Valor:" value="{{ $contact->value ?? old('value') }}">
</div>
<input type="hidden" name="person_id" value="{{ $person_id }}">
{{-- <div class="form-group">
    <label>Descrição:</label>
<input type="text" name="description" class="form-control" placeholder="Descrição:" value="{{ $plan->description ?? old('description') }}">
</div> --}}
<div class="form-group">
    <button type="submit" class="btn btn-dark">Enviar</button>
</div>
