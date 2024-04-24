@extends('layouts.app')
@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <!-- general form elements -->
            <div class="card card-primary mt-2">
                <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
                    <h3 class="card-title">Add New Note</h3>
                    <button onclick="window.history.back();" class="btn btn-secondary">Back</button>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form action="{{ route('user.note.insert') }}" method="post">
                    @csrf
                    <div class="card-body">
                        <div class="form-group mb-3">
                            <label class="fw-bold" for="name">Note Title</label>
                            <input type="text" class="form-control mt-2" name="title" value="{{ old('title') }}" placeholder="Enter Note Ttile" required>
                            <div style="color: red">{{ $errors->first('title') }}</div>
                        </div>
                        <div class="form-group">
                            <label class="fw-bold" for="note">Note Content</label>
                            <textarea class="form-control mt-2" name="content" cols="30" rows="5">{{ old('content') }}</textarea>
                        </div>
                    </div>
                    <!-- /.card-body -->
            
                    <div class="card-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
            
        </div>
    </section>
</div>
@endsection