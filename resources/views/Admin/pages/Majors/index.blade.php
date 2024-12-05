<!-- Content Wrapper. Contains page content -->
@extends('Admin.layouts.app')

@section('admin-content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Majors</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">

                            <li class="breadcrumb-item active">Majors</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Name</th>
                                        <th>image</th>
                                        <th colspan="2">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($majors as $major)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>

                                                {{ $major->name }}
                                            </td>
                                            <td>
                                                <img src="{{ asset('uploads/majors/' . $major->image) }}"
                                                    alt="{{ $major->name }}" class="img-thumbnail" width="100">

                                            </td>
                                            <td>
                                                <a class="btn text-info" href="{{route('majors.edit',$major->id)}}">
                                                    <i class="fas fa-pen"></i>
                                                </a>
                                                <a class="btn text-danger" href="">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </td>
                                        </tr>

                                        <tr>
                                            <td colspan="4">

                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>

                            <div class="p-2">



                                {{ $majors->links() }}
                            </div>
                        </div>
                    </div>

              
                </div>
            </div>
        </section>
        <!-- /.content -->
    </div>
@endsection
