
@extends('app')
@section('content')

    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a class="text-decoration-none" href="./index.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">majors</li>
            </ol>
        </nav>
  


       
            
       
        <div class="majors-grid">
            @forelse ($majors as $major)
            <div class="card p-2" style="width: 18rem;">
                <img src="{{ asset('uploads/majors/' . $major->image) }}" class="card-img-top rounded-circle card-image-circle"
                    alt="major">
                <div class="card-body d-flex flex-column gap-1 justify-content-center">
                    <h4 class="card-title fw-bold text-center">{{$major->name}}</h4>
                    <a href="{{ route('doctors', ['major' => $major->id]) }}" class="btn btn-outline-primary card-button">Browse Doctors</a>

                </div>

            </div>
            @empty
            <div class="text-center alert alert-info">there is no majors!</div>
            @endforelse
  
        </div>

<div class="p-2">

    

    {{$majors->links()}}
</div>

@endsection