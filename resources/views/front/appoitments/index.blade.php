@extends('app')
@section('content')
<div class="container">
    <nav
      style="--bs-breadcrumb-divider: '>'"
      aria-label="breadcrumb"
      class="fw-bold my-4 h4"
    >
      <ol class="breadcrumb justify-content-center">
        <li class="breadcrumb-item">
          <a class="text-decoration-none" href="../index.html">Home</a>
        </li>
        <li class="breadcrumb-item">
          <a class="text-decoration-none" href="./index.html">doctors</a>
        </li>
        <li class="breadcrumb-item active" aria-current="page">
          {{$doctor->name}}
        </li>
      </ol>
    </nav>
    <div class="d-flex flex-column gap-3 details-card doctor-details">
      <div class="details d-flex gap-2 align-items-center">
        <img
          src="{{asset('uploads/doctors/'.$doctor->image)}}"
          alt="doctor"
          class="img-fluid rounded-circle"
          height="150"
          width="150"
        />
        <div class="details-info d-flex flex-column gap-3">
          <h4 class="card-title fw-bold"> {{$doctor->name}}</h4>
          <h6 class="card-title fw-bold">
            {{$doctor->major->name}}
          </h6>
        </div>
      </div>
      <hr />
      <form class="form" action="{{route('appointments.booking',$doctor->id)}}" method="POST" novalidate >
        @csrf
        <x-success></x-success>
        <x-errors></x-errors>
        <div class="form-items">
          <div class="mb-3">
            <label class="form-label required-label" for="name">Name</label>
            <input type="text" value="{{auth()->user()->name}}" class="form-control" id="name" name="name" />
          </div>
          <div class="mb-3">
            <label class="form-label required-label" for="email"
              >Email</label
            >
            <input type="email"value="{{auth()->user()->email}}"class="form-control" id="email" name="email" />
          </div>
          <div class="mb-3">
            <label class="form-label required-label" for="email"
              >phone</label>
            <input type="text" class="form-control" id="phone" name="phone" />             
          </div>
        </div>
        <button type="submit" class="btn btn-primary">
          Confirm Booking
        </button>
      </form>
    </div>
  </div>

  @endsection