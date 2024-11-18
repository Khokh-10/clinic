@extends('app')
@section('content')
    <div class="row">

        <div class="col-6 mx-auto">
            <form method='POST' action="{{url('majors')}}" class="my-5 border p-3" enctype="multipart/form-data" >
                @csrf
                <x-success></x-success>
                <x-errors></x-errors>
                <div class="mb-3">
                    <label for="">Major Name</label>
                    <input type="text" name='name' class="form-control">
                </div>


                <div class="mb-3">

                    <label for="">Major image</label>
                    <input type="file" name="image" class=" form-control">
                </div>


                <div class="mb-3">

                    <button type="submit" class="form-control btn btn-primary">Submit</button>

                </div>





            </form>
        </div>
    </div>
@endsection
