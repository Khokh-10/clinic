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
        <form action="{{route('majors.store')}}" method="POST" enctype="multipart/form-data">
            @csrf
            
            <x-success></x-success>
            <x-errors></x-errors>

            
            <div class="card-body">
                <!-- Name Field -->
                <div class=" col-md-7 form-group">
                    <label for="name">Major Name</label>
                    <input type="text" name="name" id="name" class="form-control"  >
                </div>

               

                <!-- New Image Upload -->
                <div class=" col-md-12 form-group">
                    <label for="image">Upload New Image </label>
                    <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="image">
                        <label class="custom-file-label" for="image">Choose file</label>
                    </div>
                </div>
            </div>

            <!-- Form Buttons -->
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Add Major</button>
                <a href="{{ route('majors.index') }}" class="btn btn-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection
