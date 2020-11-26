@extends('layouts.default')

@section('title', 'Songs index')

@section('content')
<h1>
  Songs index
</h1>

<ul>
  @forelse ($songs as $song)
  <li>
    {{$song->album_id}} | {{$song->title}} |  {{$song->lyrics}}
  </li>
  @empty
  <li>No posts yet</li>
  @endforelse
</ul>

@endsection