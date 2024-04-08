@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $movie->localisation }}</h1>
        <div class="movie">
            <h2>{{ $movie->name }}</a></h2>
            @if (!empty($movie->average_rating))
                <p>Рейтинг: {{ $movie->average_rating }}</p>
            @endif
        </div>
    <a href="{{ route('edit', ['id' => $movie->id]) }}" class="btn btn-primary">Изменить</a>
    <form action="{{ route('destroy',['id' => $movie->id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Удалить</button>
    </form>
</div>
@endsection

