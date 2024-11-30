@extends('app')
@section('content')
    <div class="container">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb" class="fw-bold my-4 h4">
            <ol class="breadcrumb justify-content-center">
                <li class="breadcrumb-item"><a class="text-decoration-none" href="./index.html">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">login</li>
            </ol>
        </nav>
        <div class="d-flex flex-column gap-3 account-form mx-auto mt-5">
            <form method="POST" class="form" action="{{ route('auth.store') }}" novalidate>
                @csrf
                <x-success></x-success>
                <x-errors></x-errors>
                <div class="form-items">
                    <div class="mb-3">
                        <label class="form-label required-label" for="name">Name</label>
                        <input type="text" name="name" class="form-control" id="name" required>
                    </div>

                    <div class="mb-3">
                        <label class="form-label required-label" for="email">Email</label>
                        <input type="email" name="email" class="form-control" id="email" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label required-label" for="password">password</label>
                        <input type=""name="password" class="form-control" id="password" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label required-label" for="password">Confirm password</label>
                        <input type="" name="password_confirmation" class="form-control" id="password" required>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Create account</button>
            </form>
            <div class="d-flex justify-content-center gap-2">
                <span>already have an account?</span><a class="link" href="{{route('auth.login')}}"> login</a>
            </div>
        </div>
    @endsection
