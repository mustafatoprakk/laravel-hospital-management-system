@extends('layouts/app')


@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="card text-center">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        <img src="/profiles/{{ $user->image }}" class="rounded-circle mx-auto d-block" alt="..." width="150px"
                            height="150px">

                        <form action="{{ route('user.update', $user->id) }}" method="post" class="px-5"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <!-- Name input -->
                            <div class="form-outline my-4">
                                <input type="text" id="u_name" name="u_name" class="form-control"
                                    value="{{ $user->name }}" />
                                <label class="form-label" for="u_name">Name</label>
                            </div>

                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <input type="email" id="u_email" name="u_email" class="form-control"
                                    value="{{ $user->email }}" />
                                <label class="form-label" for="u_email">Email address</label>
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <input type="password" id="u_password" name="u_password" class="form-control" />
                                <label class="form-label" for="u_password">Password</label>
                            </div>

                            <!-- Phone input -->
                            <div class="form-outline mb-4">
                                <input type="phone" id="u_phone" name="u_phone" class="form-control"
                                    value="{{ $user->phone }}" />
                                <label class="form-label" for="u_phone">Phone</label>
                            </div>

                            <!-- Image input -->
                            <div class=" mb-4">
                                <input type="file" class="form-control form-control-lg" id="image" name="image" />
                                <input type="hidden" id="oldImage" name="oldImage" class="form-control"
                                    value="{{ $user->image }}" />
                            </div>
                            <button type="submit" class="btn btn-primary btn-block mb-4">Update</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
