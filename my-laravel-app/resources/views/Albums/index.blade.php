@extends('layouts.default')

@section('title', 'Ambums index')

@section('content')
<h1>
  Ambums index
</h1>

<ul>
  @forelse ($albums as $album)
  <li>
    {{$album->artist_id}} | {{$album->name}} |  {{$album->cover}}
  </li>
  @empty
  <li>No posts yet</li>
  @endforelse
</ul>

@endsection