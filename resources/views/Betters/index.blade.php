<?php $i=0 ?>
@extends('layouts.app')
@section('content')
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
            <th>Veiksmai: </th>
        </tr>
        @foreach ($betters as $better)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $better->name }}</td>
            <td>{{ $better->surname }}</td>
            <td>{{ $better->bet }}</td>
            <td>{{ $better->horses->name }}</td>
            <td>
                <form action={{ route('betters.destroy', $better->id) }} method="POST">
                    <a class="btn btn-success" href={{ route('betters.edit', $better->id) }}>Redaguoti</a>
                    @csrf 
                    @method('delete')
                    <input type="submit" class="btn btn-danger" value="Trinti"/>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div>
        <a href="{{ route('betters.create') }}" class="btn btn-success">Pridėti naują</a>
    </div>
</div>
@endsection