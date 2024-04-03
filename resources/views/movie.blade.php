@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Список фильмов:</h1>
    @forelse ($movies as $movie)
        <div class="movie">
            <h2><a href="{{ route('movie', ['id' => $movie->id]) }}">{{ $movie->name }}</a></h2>
            @if (!empty($movie->average_rating))
                <p>Рейтинг: {{ $movie->average_rating }}</p>
            @endif
        </div>
    @empty
        <p>Нет фильмов.</p>
    @endforelse
</div>
@endsection
