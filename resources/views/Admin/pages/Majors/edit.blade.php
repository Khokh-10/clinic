<!-- Content Wrapper. Contains page content -->
@extends('Admin.layouts.app')

@section('admin-content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
<div class="container col-8 ms-auto ">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Major</h3>
        </div>

        <!-- Form Start -->
        <form action="{{route('majors.update',$major->id)}}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <x-success></x-success>
            <x-errors></x-errors>

            
            <div class="card-body">
                <!-- Name Field -->
                <div class=" col-md-7 form-group">
                    <label for="name">Major Name</label>
                    <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $major->name) }}" required>
                </div>

                <!-- Current Image Preview -->
                <div class=" col-md- form-group">
                    <label for="current_image">Current Image</label>
                    <br>
                    <img src="{{ asset('uploads/majors/' . $major->image) }}" alt="{{ $major->name }}" class="img-thumbnail" width="200">
                </div>

                <!-- New Image Upload -->
                <div class=" col-md-12 form-group">
                    <label for="image">Upload New Image (optional)</label>
                    <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="image">
                        <label class="custom-file-label" for="image">Choose file</label>
                    </div>
                </div>
            </div>

            <!-- Form Buttons -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update Major</button>
                <a href="{{ route('majors.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
