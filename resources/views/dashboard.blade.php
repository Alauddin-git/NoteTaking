@extends('layouts.app')
@section('content')
<div
class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
<h1 class="h3">Your Note List</h1>
<div class="btn-toolbar mb-2 mb-md-0">
    <div class="btn-group me-2">
    </div>
    <a href="{{ route('user.note.create') }}" type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
        <span data-feather="plus" class="align-text-bottom"></span>
        Create New Note
    </a>
</div>
</div>
<div class="card mb-1">
<div class="card-header">
    <h4 class="card-title">Search Note</h4>
</div>
<!-- /.card-header -->
<div class="card-body">
    <form action="" method="get">
        <div class="row p-1">
            <div class="form-group  col-md-3">
                <input type="text" class="form-control" name="name"
                    value="{{ Request::get('name') }}" placeholder="Enter Title">
            </div>
            <div class="form-group  col-md-3">
                <input type="text" class="form-control" name="name"
                    value="{{ Request::get('name') }}" placeholder="Enter Content">
            </div>
            <div class="form-group col-md-3 d-flex align-items-center">
                <button class="btn btn-primary btn-outlook mr-2" type="submit">Search</button>
                <a href="{{ route('user.note.list') }}" class="btn btn-success btn-outlook"
    role="button">Reset</a>
            </div>
        </div>
    </form>
</div>
<!-- /.card-body -->
</div>

<div class="card">
<div class="card-header">
    <h4 class="card-title">Your Note List</h4>
</div>
<!-- /.card-header -->
<div class="card-body">
    <div class="table-responsive">
        <table class="table table-striped table-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Title</th>
                    <th scope="col">Content</th>
                    <th scope="col">Created At</th>
                    <th scope="col">Updated At</th>
                </tr>
            </thead>
            <tbody>
                     @php
                     $user = 0;
                    @endphp
                    @foreach ($getNotes as $getNote)
                    @php
                    // dump($getNotes);
                    @endphp
                        <tr>
                            <td>{{ $user++ }}</td>
                            {{-- <td>{{ $getNote->title }}</td>
                            <td>{{ $getNote->content }}</td> --}}
                        </tr>
                    @endforeach
            </tbody>
        </table>
    </div>
    <!-- /.card-body -->
</div>
</div> 
@endsection