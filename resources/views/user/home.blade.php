@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Фильмы, оцененные {{ $user->name }}</h1>
        <div class="row">
            @foreach ($ratings as $rating)
                <div class="col-md-2 mb-3">
                    <div class="card h-100">
                        <a href="{{ route('show', ['id' => $rating->movie->id]) }}">
                            <img src="{{ $rating->movie->image }}" class="card-img-top"
                                 alt="{{ $rating->movie->localisation }}">
                        </a>
                        <div class="card-body">
                            <h6 class="card-title">
                                {{ Str::limit($rating->movie->localisation, 20) }}
                            </h6>
                            @if (!empty($rating->rating ))
                                <p class="card-text">Рейтинг: {{ $rating->rating  }}</p>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
@endsection
