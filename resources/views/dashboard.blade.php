@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h3">Your Note List</h1>
    <div class="btn-toolbar mb-2 mb-md-0">
        <div class="btn-group me-2">
        </div>
        <a href="{{ route('user.note.create') }}" class="btn btn-sm btn-outline-secondary">
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
                <div class="form-group col-md-3">
                    <input type="text" class="form-control" name="title" value="{{ Request::get('title') }}" placeholder="Enter Title">
                </div>
                <div class="form-group col-md-3">
                    <input type="text" class="form-control" name="content" value="{{ Request::get('content') }}" placeholder="Enter Content">
                </div>
                <div class="form-group col-md-3 d-flex align-items-center">
                    <button class="btn btn-primary mr-2" type="submit">Search</button>
                    <a href="{{ route('user.note.list') }}" class="btn btn-success" role="button">Reset</a>
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
                        <th scope="col" style="min-width: 150px;">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @php $user = 0; @endphp
                    @foreach ($getNotes as $getNote)
                    <tr>
                        <td>{{ ++$user }}</td>
                        <td>{{ Str::limit($getNote->title, 10) }}</td>                    
                        <td>{{ Str::limit($getNote->content, 50) }}</td>   
                        <td>{{ $getNote->created_at->format('d-m-Y h:i A') }}</td>
                        <td>{{ $getNote->updated_at->format('d-m-Y h:i A') }}</td>
                        <td style="min-width: 150px;">
                            <a href="{{ route('user.note.edit', $getNote->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <button onclick="confirmDelete({{ $getNote->id }})" class="btn btn-danger btn-sm">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="padding: 10px; float:right">
                {!! $getNotes->appends(Request::except('page'))->links() !!}
            </div>
        </div>
        <!-- /.card-body -->
    </div>
</div>
@endsection

@section('script')
<script>
    function confirmDelete(noteId) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                var baseUrl = "{{ route('user.note.delete', ['id' => ':id']) }}"; 
                var deleteUrl = baseUrl.replace(':id', noteId); 
                window.location.href = deleteUrl;
            }
        });
    }
</script>
@endsection
