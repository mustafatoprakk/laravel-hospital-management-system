@extends('layouts/app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="">
                    <a href="{{ route('department.index') }}" class="btn btn-primary float-end mb-3">All Departments</a>
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
                <div class="card text-center">
                    <div class="card-body">
                        <span class="lead fs-4">Create Department</span>
                        <form action="{{ route('department.store') }}" method="post" class="px-5">
                            @csrf
                            <!-- Name input -->
                            <div class="form-floating my-4">
                                <input type="text" id="name" name="name" class="form-control "
                                    placeholder="Department Name" />
                                <label class="form-label" for="name">Department Name</label>
                            </div>
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary btn-block mb-4">Create Department</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
