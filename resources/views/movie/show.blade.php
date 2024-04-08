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
    <form action="{{ route('rateMovie',['id' => $movie->id]) }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="select"></label>
            <select class="form-control" name="rating" id="select">
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
                <option>7</option>
                <option>8</option>
                <option>9</option>
                <option>10</option>
            </select>
                <button type="submit" class="btn btn-dark">Оценить</button>
        </div>
    </form>
    <a href="{{ route('edit', ['id' => $movie->id]) }}" class="btn btn-primary">Изменить</a>
    <form action="{{ route('destroy',['id' => $movie->id]) }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Удалить</button>
    </form>
</div>
@endsection

