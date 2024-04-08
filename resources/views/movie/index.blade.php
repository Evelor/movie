@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Список фильмов:</h1>
    @forelse ($movies as $movie)
        <div class="movie">
            <h2><a href="{{ route('show', ['id' => $movie->id]) }}">{{ $movie->localisation }}</a></h2>
            @if (!empty($movie->average_rating))
                <p>Рейтинг: {{ $movie->average_rating }}</p>
            @endif
        </div>
    @empty
        <p>Нет фильмов.</p>
    @endforelse
    <a href="{{ route('create') }}" class="btn btn-primary mb-3">Добавить фильм</a>
</div>

@endsection
