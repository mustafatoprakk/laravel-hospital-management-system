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
                    <div class="card-header">
                        <span class="lead fs-4">Create Doctors</span>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('user.store') }}" method="post" class="px-5">
                            @csrf
                            <!-- Name input -->
                            <div class="form-outline my-4">
                                <input type="text" id="name" name="name" class="form-control" />
                                <label class="form-label" for="name">Name</label>
                            </div>

                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <input type="email" id="email" name="email" class="form-control" />
                                <label class="form-label" for="email">Email address</label>
                            </div>

                            <!-- Phone input -->
                            <div class="form-outline mb-4">
                                <input type="phone" id="phone" name="phone" class="form-control" />
                                <label class="form-label" for="phone">Phone</label>
                            </div>

                            <!-- Role input -->
                            <select id="role" name="role" class="form-select mb-4" aria-label="Gender">
                                <option selected>Gender</option>
                                <option value="0">Female</option>
                                <option value="1">Male</option>
                            </select>

                            <!-- Role input -->
                            <select id="hospital" name="hospital" class="form-select mb-4" aria-label="Hospital">
                                <option selected>Hospital</option>
                                <option value="0">Shouldice Hospital</option>
                                <option value="1">Sharp Memorial Hospital</option>
                            </select>

                            <!-- Role input -->
                            <select id="department" name="department" class="form-select mb-4" aria-label="Department">
                                <option selected>Department</option>
                                <option value="0">Surgery</option>
                                <option value="1">Medicine</option>
                            </select>

                            <!-- Image input -->
                            <div class=" mb-4">
                                <input type="file" class="form-control" id="image" name="image" />
                            </div>

                            <button type="submit" class="btn btn-primary btn-block mb-4">Create Doctor</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
