@extends('layouts.app')

@section('title', 'Create Channel')

@section('content')
    <div class="container">
        <h1 class="my-4">Create a New Channel</h1>

        <form method="POST" action="{{ route('channels.store') }}">
            @csrf
            <div class="form-group">
                <label for="channelName">Channel Name</label>
                <input type="text" name="channelName" id="channelName" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="description">Description</label>
                <textarea name="description" id="description" class="form-control"></textarea>
            </div>
            <div class="form-group">
                <label for="subscribersCount">Subscribers Count</label>
                <input type="number" name="subscribersCount" id="subscribersCount" class="form-control">
            </div>
            <div class="form-group">
                <label for="URL">URL</label>
                <input type="text" name="URL" id="URL" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Create Channel</button>
        </form>
    </div>
@endsection
