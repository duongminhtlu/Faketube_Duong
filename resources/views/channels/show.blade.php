@extends('layouts.app')

@section('title', $channel->channelName)

@section('content')
    <div class="container">
        <h1 class="my-4">Channel Details: {{ $channel->channelName }}</h1>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Channel Information</h5>
                <p class="card-text"><strong>Channel Name:</strong> {{ $channel->channelName }}</p>
                <p class="card-text"><strong>Description:</strong> {{ $channel->description }}</p>
                <p class="card-text"><strong>Subscribers Count:</strong> {{ $channel->subscribersCount }}</p>
                <p class="card-text"><strong>URL:</strong> {{ $channel->URL }}</p>
                <p class="card-text"><strong>Created At:</strong> {{ $channel->created_at }}</p>
                <p class="card-text"><strong>Updated At:</strong> {{ $channel->updated_at }}</p>
            </div>
        </div>

        <div class="mt-3">
            <a href="{{ route('channels.edit', $channel->channelId) }}" class="btn btn-primary">Edit Channel</a>
            <form action="{{ route('channels.destroy', $channel->channelId) }}" method="POST" style="display: inline-block;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete Channel</button>
            </form>
        </div>
    </div>
@endsection
