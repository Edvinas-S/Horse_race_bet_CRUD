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
                        <label for="">Vardas: </label>
                        <input type="text" name="name" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Pavardė: </label>
                        <input type="text" name="surname" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Statoma suma:</label>
                        <input type="number" name="bet" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Pasirinktas arklys: </label>
                        <select name="horse_id" id="" class="form-control">
                            @foreach ($horses as $horse)
                            <option value="{{ $horse->id }}">{{ $horse->name }}</option>
                            @endforeach
                        </select>
                       <button type="submit" class="btn btn-primary">Submit</button>
                   </form>
               </div>
           </div>
       </div>
   </div>
</div>
@endsection