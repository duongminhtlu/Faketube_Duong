@extends('layouts.app')

@section('content')
    <h1>Channels</h1>

    <a href="{{ route('channels.create') }}" class="btn btn-success">Create Channel</a>

    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Description</th>
            <th>Subscribers</th>
            <th>URL</th>
            <th>Created At</th>
            <th>Updated At</th>
            <th>Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($channels as $channel)
            <tr>
                <td>{{ $channel->channelId }}</td>
                <td>{{ $channel->channelName }}</td>
                <td>{{ $channel->description }}</td>
                <td>{{ $channel->subscribersCount }}</td>
                <td>{{ $channel->URL }}</td>
                <td>{{ $channel->created_at }}</td>
                <td>{{ $channel->updated_at }}</td>
                <td>
                    <a href="{{ route('channels.show', $channel->channelId) }}" class="btn btn-info">View</a>
                    <a href="{{ route('channels.edit', $channel->channelId) }}" class="btn btn-primary">Edit</a>
                    <!-- Trigger modal for delete confirmation -->
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#deleteModal{{ $channel->channelId }}">
                        Delete
                    </button>
                    <!-- Modal -->
                    <div class="modal fade" id="deleteModal{{ $channel->channelId }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete the channel "{{ $channel->channelName }}"?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <form action="{{ route('channels.destroy', $channel->channelId) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal -->
                    <div class="modal fade" id="deleteModal{{ $channel->channelId }}" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    Are you sure you want to delete the channel "{{ $channel->channelName }}"?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                    <form action="{{ route('channels.destroy', $channel->channelId) }}" method="POST" style="display: inline-block;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $channels->links('pagination::bootstrap-4') }}
    </div>
@endsection
