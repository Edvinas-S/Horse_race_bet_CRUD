@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Sukuriame naują lažybininką:</div>
                <div class="card-body">
                    <form action="{{ route('betters.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <strong>Whoops!</strong>
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <label for="">Vardas: </label>
                        <input type="text" name="name" class="form-control" value="{{old('name')}}">
                    </div>
                    <div class="form-group">
                        <label for="">Pavardė: </label>
                        <input type="text" name="surname" class="form-control" value="{{old('surname')}}">
                    </div>
                    <div class="form-group">
                        <label for="">Statoma suma:</label>
                        <input type="number" name="bet" class="form-control" value="{{old('bet')}}">
                    </div>
                    <div class="form-group">
                        <label>Pasirinktas arklys: </label>
                        <select name="horse_id" id="" class="form-control">
                            <option></option>
                            @foreach ($horses as $horse)
                                <option value="{{ $horse->id }}" @if($horse->id == old('horse_id')) selected="selected" @endif>{{ $horse->name }}</option>
                            @endforeach
                        </select>
                        <button style="margin-top: 20px" type="submit" class="btn btn-primary">Sukurti</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection