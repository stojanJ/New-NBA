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

    <div>
        <ul>
            @foreach ($team->comments as $comment)
                <li>
                    <p>
                        {{ $comment->content }} by {{ $comment->user->name }}
                    </p>
                </li>
            @endforeach
        </ul>
        </div>
    
        <h2>Leave a comment</h2>
    
        <form method="post" action="{{ route('team-comments', ['team_id' => $team->id]) }}">
    
            <div>
                <label>Content</label>
                <textarea type="email" name="content"></textarea>
                @include('partials.error')
                <button type="submit">Submit</button>
            </div>
    
        </form>

@endsection