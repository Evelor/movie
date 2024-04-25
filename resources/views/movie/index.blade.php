@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Список фильмов:</h1>
    <div class="row">
        @forelse ($movies as $movie)
            <div class="col-md-2 mb-3">
                <div class="card h-100">
                    <a href="{{ route('show', ['id' => $movie->id]) }}"><img src="{{ $movie->image }}" class="card-img-top" alt="{{ $movie->localisation }}"></a>
                    <div class="card-body">
                        <h6 class="card-title"><a href="{{ route('show', ['id' => $movie->id]) }}">{{ Str::limit($movie->localisation, 20) }}</a></h6>
                        @if (!empty($movie->average_rating))
                            <p class="card-text">Рейтинг: {{ $movie->average_rating }}</p>
                        @endif
                    </div>
                </div>
            </div>
        @empty
        <p>Нет фильмов.</p>
    @endforelse
    <a href="{{ route('create') }}" class="btn btn-primary mb-3">Добавить фильм</a>
</div>

@endsection
