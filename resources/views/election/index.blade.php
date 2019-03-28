@extends('layouts.app')

@section('content')
<div class="row justify-content-center">
    <div class="col-md-12">
        @include('inc.message')
        <div class="row">
            <div class="col-md-8"><h3> {{ __('My Elections List') }}</h3></div>
            <div class="col-md-4"><a href="{{ route('election.create') }}" class="btn btn-primary float-right">New</a></div>
        </div><br>

        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Title</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach($my_elections as $row)
                <tr>
                    <td><a href="">{{ $row->title }}</a></td>
                    <td>{{ Carbon\Carbon::parse($row->start_datetime)->isoFormat('Do MMMM YYYY, h:mm a') }}</td>
                    <td>{{ Carbon\Carbon::parse($row->end_datetime)->isoFormat('Do MMMM YYYY, h:mm a') }}</td>
                    <td>
                        @if(date('Y-m-d h:i:s') < $row->start_datetime)
                            <span class="text text-danger">Not Started</span>
                        @elseif($row->start_datetime >= date('Y-m-d h:i:s') && date('Y-m-d h:i:s') <= $row->end_datetime)
                            <span class="text text-primary">Running</span>
                        @elseif(date('Y-m-d h:i:s') > $row->end_datetime)
                            <span class="text text-success">Ended</span>
                        @endif
                    </td>
                    <td>
                        <a href="/election/{{$row->id}}/config" class="btn btn-sm btn-success">Config</a>
                        <a href="" class="btn btn-sm btn-primary">Edit</a>
                        <a href="" class="btn btn-sm btn-danger">Delete</a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
