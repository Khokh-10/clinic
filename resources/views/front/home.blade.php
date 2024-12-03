@extends('app')
@section('content')
    <div class="container-fluid bg-blue text-white pt-3">
        <div class="container pb-5">
            <div class="row gap-2">
                <div class="col-sm order-sm-2">
                    <img src="{{ asset('front/assets/images/banner.jpg') }}" class="img-fluid banner-img" alt="banner-image" height="200">
                </div>
                <div class="col-sm order-sm-1">
                    <h1 class="h1">Have a Medical Question?</h1>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ipsa nesciunt repellendus itaque laborum saepe
                        enim maxime, delectus, dicta cumque error cupiditate nobis officia quam perferendis consequatur cum iure
                        quod facere.</p>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <h2 class="h1 fw-bold text-center my-4">Majors</h2>
        <div class="majors-grid">
            @forelse ($majors as $major)
                <div class="card p-2" style="width: 18rem;">
                    <img src="{{ asset('uploads/majors/' . $major->image) }}" class="card-img-top rounded-circle card-image-circle" alt="major">
                    <div class="card-body d-flex flex-column gap-1 justify-content-center">
                        <h4 class="card-title fw-bold text-center">{{ $major->name }}</h4>
                        <a href="{{ route('doctors', ['major' => $major->id]) }}" class="btn btn-outline-primary card-button">Browse Doctors</a>
                    </div>
                </div>
            @empty
                <div class="text-center alert alert-info">There are no majors!</div>
            @endforelse
        </div>

        <div class="p-2">
            {{ $majors->links() }}
        </div>
    </div>

    <h2 class="h1 fw-bold text-center my-4">Doctors</h2>
    <section class="splide home__slider__doctors mb-5">
        <div class="splide__track">
            <ul class="splide__list">
                @forelse ($doctors as $doctor)
                    <li class="splide__slide">
                        <div class="card p-2" style="width: 18rem;">
                            <img src="{{ asset('uploads/doctors/' . $doctor->image) }}" class="card-img-top rounded-circle card-image-circle" alt="doctor">
                            <div class="card-body d-flex flex-column gap-1 justify-content-center">
                                <h4 class="card-title fw-bold text-center">{{ $doctor->name }}</h4>
                                <h6 class="card-title fw-bold text-center">{{ $doctor->major->name }}</h6>
                                <a href="" class="btn btn-outline-primary card-button">Book an Appointment</a>
                            </div>
                        </div>
                    </li>
                @empty
                    <div class="text-center alert alert-info">There are no doctors!</div>
                @endforelse
            </ul>
        </div>
        <div class="p-2">
            {{ $doctors->links() }}
        </div>
    </section>
@endsection
