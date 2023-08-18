@extends('layouts.app')

@section('title', 'Edit Channel')

@section('content')
    <div class="container">
        <h1 class="my-4">Edit Channel: {{ $channel->channelName }}</h1>

        <form method="POST" action="{{ route('channels.update', $channel->channelId) }}">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="channelName">Channel Name</label>
                <input type="text" name="channelName" id="channelName" class="form-control" value="{{ $channel->channelName }}" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control">{{ $channel->description }}</textarea>
            </div>
            <div class="form-group">
                <label for="subscribersCount">Subscribers Count</label>
                <input type="number" name="subscribersCount" id="subscribersCount" class="form-control" value="{{ $channel->subscribersCount }}">
            </div>
            <div class="form-group">
                <label for="URL">URL</label>
                <input type="text" name="URL" id="URL" class="form-control" value="{{ $channel->URL }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Channel</button>
        </form>
    </div>
@endsection

