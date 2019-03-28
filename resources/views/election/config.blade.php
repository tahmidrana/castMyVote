@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        @include('inc.message')
        <div class="card">
            <div class="card-body">
                <h3>{{ $election->title }}</h3>
                <p><b>Start Date:</b> {{ Carbon\Carbon::parse($election->start_datetime)->isoFormat('Do MMMM YYYY, h:mm a') }} <br/>
                <b>End Date:</b> {{ Carbon\Carbon::parse($election->end_datetime)->isoFormat('Do MMMM YYYY, h:mm a') }} <br/>
                <b>Host:</b> {{ $election->host->name }} </p>
                <p><b>Details: </b>{{ $election->description }}</p>
            </div>
        </div>
        <br>

        <div class="card">
            <div class="card-header">{{ __('Election Positions') }} <button type="button" class="btn btn-primary btn-sm float-right" data-toggle="modal" data-target="#exampleModal">New</button></div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Position</th>
                            <th>Total Candidate</th>
                            <th>Status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($election->posts as $post)
                        <tr>
                            <td>{{ $post->title }}</td>
                            <td></td>
                            <td><span class="text {{ $post->status == 1 ? 'text-success' : 'text-danger' }}">{{ $post->status == 1 ? 'Active' : 'Inactive' }}</span></td>
                            <td><a href="" class="btn btn-sm btn-primary">Edit</a> <a href="" class="btn btn-sm btn-danger">Delete</a></td>
                        </tr>
                        @endforeach                        
                    </tbody>
                </table>
            </div>
        </div>

    </div>
</div>

<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Post</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" action="{{ route('election_post.store') }}">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" name="election_id" id="election_id" value="{{ $election->id }}">
                        <label for="title">{{ __('Title') }}</label>
                        <input type="text" name="title" id="title" class="form-control" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </form>            
        </div>
    </div>
</div>
@endsection


@section('scripts')

@endsection