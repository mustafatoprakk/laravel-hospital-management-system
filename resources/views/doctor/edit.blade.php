@extends('/layouts/app')

@section('content')
    <div class="container my-5" style="padding-bottom:200px">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="">
                    <a href="{{ route('doctor.index') }}" class="btn btn-primary float-end mb-3">All Doctors</a>
                </div>
            </div>
            <div class="col-md-8 offset-md-2">
                <div class="card text-center">
                    @if (session()->has('message'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session()->get('message') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif
                    <div class="card-body">
                        <img src="/profiles/{{ $doctor->image }}" class="rounded-circle mx-auto d-block shadow" alt="..."
                            width="200px" height="200px">
                        <form action="{{ route('doctor.update', $doctor->id) }}" method="post" class="px-5"
                            enctype="multipart/form-data">
                            @method('PUT')
                            @csrf
                            <!-- Name input -->
                            <div class="form-floating my-4">
                                <input type="text" id="name" name="name" class="form-control "
                                    placeholder="Doctor Name" value="{{ $doctor->name }}" />
                                <label class="form-label" for="name">Doctor Name</label>
                            </div>

                            <!-- Email input -->
                            <div class="form-floating mb-4">
                                <input type="email" id="email" name="email" class="form-control"
                                    placeholder="Doctor Email" value="{{ $doctor->email }}" />
                                <label class="form-label" for="email">Email address</label>
                            </div>

                            <!-- Phone input -->
                            <div class="form-floating mb-4">
                                <input type="phone" id="phone" name="phone" class="form-control"
                                    placeholder="Doctor Phone" value="{{ $doctor->phone }}" />
                                <label class="form-label" for="phone">Doctor Phone</label>
                            </div>

                            <!-- Gender input -->
                            <div class="form-floating">
                                <select id="gender" name="gender" class="form-select mb-4" aria-label="Gender">
                                    <option selected>Gender</option>
                                    <option value="0" {{ $doctor->gender == 0 ? 'selected' : '' }}>Female</option>
                                    <option value="1" {{ $doctor->gender == 1 ? 'selected' : '' }}>Male</option>
                                </select>
                                <label for="gender">Your Gender</label>
                            </div>

                            <!-- Hospital input -->
                            <div class="form-floating">
                                <select id="hospital" name="hospital" class="form-select mb-4" aria-label="Hospital">
                                    <option selected>Select Hospital</option>
                                    @foreach ($hospitals as $hospital)
                                        <option value="{{ $hospital->id }}"
                                            @foreach ($doctor->hospital as $hosp) {{ $hosp->id == $hospital->id ? 'selected' : '' }} @endforeach>
                                            {{ strtoupper($hospital->name) }}</option>
                                    @endforeach
                                </select>
                                <label for="hospital">Your Hospital</label>
                            </div>

                            <!-- Department input -->
                            <div class="form-floating">
                                <select id="department" name="department" class="form-select mb-4" aria-label="Department">
                                    @foreach ($doctor->department as $department)
                                        <option value="{{ $department->id }}"
                                            {{ $department->id != '' ? 'selected' : '' }}>
                                            {{ strtoupper($department->name) }}</option>
                                    @endforeach
                                </select>
                                <label for="department">Your Department</label>
                            </div>

                            <!-- Image input -->
                            <div class=" mb-4">
                                <input type="file" class="form-control form-control-lg" id="image" name="image" />
                                <input type="hidden" name="oldImage" value="{{ $doctor->image }}">
                            </div>

                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-block mb-4">Update Doctor</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
