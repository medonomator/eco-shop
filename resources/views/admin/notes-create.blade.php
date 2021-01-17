@extends('layouts.admin') @section('content')

<h1>Новая заметка</h1>
<form action="/admin/notes/create" method="POST">
    @csrf
    <div class="ui form">
        <div class="field">
            <label>Text</label>
            <textarea name="body"></textarea>
        </div>
    </div>
    <br />
    <button class="ui primary button">Создать</button>
</form>

@endsection
