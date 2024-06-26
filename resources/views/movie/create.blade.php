@extends('layouts.app')
@section('content')
    <form method="post" action="{{ route('store') }}">
        @csrf
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="localisation">Название</label>
                <input type="text" class="form-control" name="localisation" id="localisation">
            </div>
            <div class="form-group col-md-6">
                <label for="name">Оригинальное название</label>
                <input type="text" class="form-control" name="name" id="name">
            </div>
        </div>
        <div class="form-group col-md-6">
            <label for="year">Год</label>
            <input type="text" class="form-control" name="year" id="year">
        </div>
        <div class="form-group col-md-6">
            <label for="director">Режиссёр</label>
            <input type="text" class="form-control" name="director" id="director">
        </div>
        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="image">Постер</label>
                <input type="text" class="form-control" name="image" id="image">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Добавить</button>
    </form>
@endsection
