@extends('layouts.admin') @section('content')

<h1>Notes</h1>
<a class="ui primary button" href="notes/create">Создать заметку</a>
<br />
@if (session('update'))
<div class="ui positive message">
    <i class="close icon"></i>
    <div class="header">
        {{ session("update") }}
    </div>
</div>
@endif
<br />
<div class="notes">
    @foreach ($notes as $index=>$note)
    <form action="/admin/notes/update" class="notes-item" method="POST">
        @method('PUT') @csrf
        <div class="left-block">
            <p>{{ $index + 1 }}</p>
        </div>
        <div class="middle-block">
            <textarea name="body">{{$note->body}}</textarea>
        </div>
        <input hidden name="noteId" type="text" value="{{$note->id}}" />
        <div class="right-block">
            <button class="ui green button">Обновить</button>
            <a class="ui red button" href="notes/delete/{{$note->id}}">Удалить</a>
        </div>
    </form>

    @endforeach
</div>

@endsection
