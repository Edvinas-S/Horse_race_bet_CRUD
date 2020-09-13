<?php $i=0 ?>
@extends('layouts.app')
@section('content')
{{-- Select option --}}
<div class="card-body">
    <form action="{{ route('betters.index') }}" method="GET">
        <select name="horse_id" id="" class="form-control">
            <option value="" selected disabled>Pasirinkite arklį filtravimui:</option>
            @foreach ($horses as $horse)
            <option value="{{ $horse->id }}" 
                @if($horse->id == app('request')->input('horse_id')) 
                    selected="selected" 
                @endif>{{ $horse->name }}</option>
            @endforeach
        </select>
        <button type="submit" class="btn btn-primary" style="margin-top: 20px">Pasirinkti</button>
    </form>
</div>
{{-- Main content --}}
<div class="card-body">
    <table class="table">
        @if(session()->get('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif
        <tr>
            <th>Nr.: </th>
            <th>Vardas: </th>
            <th>Pavardė: </th>
            <th>Statoma suma: </th>
            <th>Pasirinktas arklys: </th>
            @auth
                <th>Veiksmai: </th>
            @endauth
        </tr>
        @foreach ($betters as $better)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $better->name }}</td>
            <td>{{ $better->surname }}</td>
            <td>{{ $better->bet }}</td>
            <td>{{ $better->horses->name }}</td>
            @auth
                <td>
                    <form action={{ route('betters.destroy', $better->id) }} method="POST">
                        <a class="btn btn-success" href={{ route('betters.edit', $better->id) }}>Redaguoti</a>
                        @csrf 
                        @method('delete')
                        <input type="submit" class="btn btn-danger" value="Trinti"/>
                    </form>
                </td>
            @endauth
        </tr>
        @endforeach
    </table>
    @auth
        <div>
            <a href="{{ route('betters.create') }}" class="btn btn-success">Pridėti naują</a>
        </div>
    @endauth
</div>
@endsection