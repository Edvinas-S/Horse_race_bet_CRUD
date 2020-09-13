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
        @if (session()->get('error'))
            <div class="alert alert-danger">
                {{ session()->get('error') }}
            </div>
    @endif
        <tr>
            <th>Nr.: </th>
            <th>Vardas: </th>
            <th>Dalyvavo bėgimų: </th>
            <th>Laimėta bėgimų: </th>
            <th>Apie arklį: </th>
            @auth
                <th>Veiksmai: </th>
            @endauth
        </tr>
        @foreach ($horses as $horse)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $horse->name }}</td>
            <td>{{ $horse->runs }}</td>
            <td>{{ $horse->wins }}</td>
            <td>{!! $horse->about !!}</td>
            @auth
                <td>
                    <form action={{ route('horses.destroy', $horse->id) }} method="POST">
                        <a class="btn btn-success" href={{ route('horses.edit', $horse->id) }}>Redaguoti</a>
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
            <a href="{{ route('horses.create') }}" class="btn btn-success">Pridėti naują</a>
        </div>
    @endauth
</div>
@endsection