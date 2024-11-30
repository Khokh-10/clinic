@extends('app')
@section('content')
<div class="page-wrapper">
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a class="text-decoration-none" href="../index.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">doctors</li>
            </ol>
        </nav>
        <div class="doctors-grid">
            
            @forelse ($doctors as $doctor)
            <div class="card p-2" style="width: 18rem;">
                <img src="{{ asset('uploads/doctors/' . '2.jpg') }}" class="card-img-top rounded-circle card-image-circle"
                    alt="major">
                <div class="card-body d-flex flex-column gap-1 justify-content-center">
                    <h4 class="card-title fw-bold text-center">{{$doctor->name}}</h4>
                    <h6 class="card-title fw-bold text-center">{{$doctor->major->name}}</h6>
                    <a href="./doctor.html" doctor.html" class="btn btn-outline-primary card-button">Book an
                        appointment</a>
                </div>
               
            </div>

            @empty
            <div class="text-center alert alert-info">there is no doctors!</div>
            @endforelse


        </div>
        <div class="p-2">

    

            {{$doctors->links()}}


@endsection