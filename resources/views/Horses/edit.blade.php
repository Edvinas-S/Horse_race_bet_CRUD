@auth
@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Pakeisti informacija apie arklį: </div>
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form method="POST" action="{{ route('horses.update', $horse->id) }}">
                        @csrf 
                        @method("PUT")
                        <div class="form-group">
                            <label for="">Vardas: </label>
                            <input type="text" name="name" class="form-control" value="{{ $horse->name }}">
                        </div>
                        <div class="form-group">
                            <label for="">Dalyvavo bėgimų:</label>
                            <input type="number" name="runs" class="form-control" value="{{ $horse->runs }}">
                        </div>
                        <div class="form-group">
                            <label for="">Laimėta bėgimų:</label>
                            <input type="number" name="wins" class="form-control" value="{{ $horse->wins }}">
                        </div>
                        <div class="form-group">
                            <label for="">Apie arklį:</label>
                            <textarea type="text" name="about" id="mce" rows=10 cols=100 class="form-control">{{ $horse->about }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Pakeisti</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@endauth