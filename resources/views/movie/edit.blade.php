@extends('layouts.app')
@section('content')
    <form action="{{ route('update',$movie->id) }}" method="POST">
        @csrf
        @method('put')
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="localisation">Название</label>
                <input type="text" class="form-control" name="localisation" id="localisation" value="{{ $movie->localisation }}">
            </div>
            <div class="form-group col-md-6">
                <label for="name">Оригинальное название</label>
                <input type="text" class="form-control" name="name" id="name" value="{{ $movie->name }}">
            </div>
        </div>
        <div class="form-group col-md-6">
            <label for="year">Год</label>
            <input type="text" class="form-control" name="year" id="year" value="{{ $movie->year }}">
        </div>
        <div class="form-group col-md-6">
            <label for="director">Режиссёр</label>
            <input type="text" class="form-control" name="director" id="director" value="{{ $movie->director }}">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="image">Постер</label>
                <input type="text" class="form-control" name="image" id="image" value="{{ $movie->image }}">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Изменить</button>
    </form>
@endsection
