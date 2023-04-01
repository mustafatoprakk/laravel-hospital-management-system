@extends('layouts/app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="">
                    <a href="{{ route('date.index') }}" class="btn btn-primary float-end mb-3">All Dates</a>
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
                        <span class="lead fs-4">Update Date</span>
                        <form action="{{ route('date.update', $date->id) }}" method="post" class="px-5">
                            @csrf
                            @method('PUT')
                            <!-- Date input -->
                            <div class="row" class="mb-4">
                                <div class="col-md-12 hour my-4">
                                    <div class="form-floating mb-4">
                                        <input type="date" id="date" name="date" class="form-control"
                                            value="{{ $date->date }}" min="{{ date('Y-m-d', strtotime('+1 day')) }}"
                                            placeholder="Date" />
                                        <label class="form-label" for="date">Date</label>
                                    </div>
                                    <select class="form-select mb-4" id="hour-multi-select" name="hour[]"
                                        data-placeholder="Choose anything" multiple>
                                        @foreach ($hours as $hour)
                                            <option class="lead" value="{{ $hour->id }}"
                                                @foreach ($date->hour as $date_hour) {{ $date_hour->id == $hour->id ? 'selected' : '' }} @endforeach>
                                                {{ date('H:i', strtotime($hour->hour)) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="d-grid gap-2 mt-3">
                                <button type="submit" class="btn btn-success btn-block mb-4">Update Date</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {

        });
    </script>
@endsection
