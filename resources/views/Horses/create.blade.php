@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Naujas arklys bėgime:</div>
                <div class="card-body">
                    <form action="{{ route('horses.store') }}" method="POST">
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
                            <label>Vardas: </label>
                            <input type="text" name="name" class="form-control" value="{{old('name')}}">
                        </div>
                        <div class="form-group">
                            <label>Dalyvavo lėnktynėse: </label>
                            <input type="number" name="runs" class="form-control" value="{{old('runs')}}"> 
                        </div>
                        <div class="form-group">
                        <label>Iš jų laimėjo: </label>
                        <input type="number" name="wins" class="form-control" value="{{old('wins')}}"> 
                    </div>
                        <div class="form-group">
                            <label>Aprašymas apie žirgą: </label>
                            <textarea id="mce" name="about" rows=10 cols=100 class="form-control">{{old('about')}}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Sukurti</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection