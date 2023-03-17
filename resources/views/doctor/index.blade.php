@extends('/layouts/app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-10 offset-md-1">
                <div class="text-center">
                    <span class="lead fs-4 fw-bold" style="color: #07003b">We are Experienced Healthcare Professionals</span>
                </div>
                <div class="row mt-5">
                    <div class="mb-3">
                        <a href="{{ route('doctor.create') }}" class="btn btn-primary float-end mb-3">Create Doctor</a>
                    </div>
                    @foreach ($doctors as $doctor)
                        <div class="col-md-3 mb-4">
                            <a href="{{ route('doctor.edit', $doctor->id) }}" class="text-decoration-none text-dark">
                                <div class="card shadow bg-body rounded">
                                    <img src="profiles/{{ $doctor->image }}" class="card-img-top shadow  rounded"
                                        alt="Sunset Over the Sea" />
                                    <div class="card-body">
                                        <p class="card-text text-center fw-bold fs-5" style="color: #07003b">
                                            {{ ucfirst($doctor->name) }}</p>
                                        <p class="card-text text-center">Göz Doktoru</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
