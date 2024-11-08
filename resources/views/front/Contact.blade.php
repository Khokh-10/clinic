
@extends('app')
@section('content')
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a class="text-decoration-none" href="./index.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">contact</li>
            </ol>
        </nav>
        <div class="d-flex flex-column gap-3 account-form mx-auto mt-5">
            <form class="form" method="POST" action="send-message" novalidate  >
            @csrf
            @if (@session('success') !== null)
            
            <div class="alert alert-success text-center">
                {{session('success')}}
            </div>
             @endif
           
             @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="alert alert-danger text-center">{{$error}}</div>
                @endforeach
                 
             @endif
                <div class="form-items">
                    <div class="mb-3">
                        <label class="form-label required-label" for="name">Name</label>
                        <input type="text"  name="name" class="form-control" id="name" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label required-label" for="email">Email</label>
                        <input type="email" name="email"  class="form-control" id="email" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label required-label" for="subject">subject</label>
                        <input type="text" name="subject" class="form-control" id="subject" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label required-label" for="message">message</label>
                        <textarea class="form-control" name="message"  id="message" required></textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Send Message</button>
            </form>
        </div>

    </div>
</div>

@endsection