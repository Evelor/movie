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
</div>
@endsection

