@extends('layouts/app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="">
                    <a href="{{ route('hospital.index') }}" class="btn btn-primary float-end mb-3">All Hospitals</a>
                </div>
            </div>
            <div class="col-md-8 offset-md-2">
                @if (session()->has('message'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session()->get('message') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session()->has('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session()->get('error') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <div class="card  text-center">
                    <div class="card-body">
                        <span class="lead fs-4">Create Hospital</span>
                        <form action="{{ route('hospital.store') }}" method="post" class="px-5">
                            @csrf
                            <!-- Name input -->
                            <div class="form-floating my-4">
                                <input type="text" id="name" name="name" class="form-control form-control-lg"
                                    placeholder="Hospital Name" />
                                <label class="form-label" for="name">Hospital Name</label>
                            </div>


                            <select class="form-select mb-4" name="department[]" id="department-multi-select"
                                data-placeholder="Choose anything" multiple>
                                @foreach ($departments as $department)
                                    <option class="lead" value="{{ $department->id }}">
                                        {{ ucfirst($department->name) }}</option>
                                @endforeach
                            </select>

                            <div class="d-grid gap-2 mt-4">
                                <button type="submit" class="btn btn-primary btn-block mb-4">Create Hospital</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
