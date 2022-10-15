@extends('layouts.master')

@section('title', $team->name)


@section('content')

<div class="blog-post">
    <h2 >{{ $team->name }}</h2>
    <h4>{{$team->eamil}} {{$team->adress}}{{$team->city}}</h4>
</div>

    <div>
        <h4>Players:</h4>

        <ul>
            @foreach($players as $player ) 

            @if ($player->team_id === $team->id)
            <li>
               <a href="{{ route('single-player', [ 'id' => $player->id ]) }}">  {{$player->first_name}}  </a>
            </li>
                
            @endif
            @endforeach
        </ul>    
    </div>

@endsection