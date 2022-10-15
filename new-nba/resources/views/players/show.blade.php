@extends('layouts.master')

@section('title', $player->first_name)

@section('content')
<div class="blog-post">
    <h2 >{{ $player->first_name }}</h2>
    <h4>{{$player->email}}</h4> 
    <h3>{{$player->last_name}}</h3>
    <p><a href="{{ route('single-team', ['id' => $player->team_id])}}"> {{$player->team->name}}</a></p>
    
</div>
@endsection