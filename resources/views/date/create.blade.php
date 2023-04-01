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
                        <span class="lead fs-4">Create Date</span>
                        <form action="{{ route('date.store') }}" method="post" class="px-5">
                            @csrf
                            <!-- Date input -->
                            <div class="row" class="mb-4">
                                <div class="col-md-11 hour my-4">
                                    <div class="form-floating mb-4">
                                        <input type="date" id="date" name="date[]" class="form-control "
                                            min="{{ date('Y-m-d',strtotime("+1 day")) }}" placeholder="Date" />
                                        <label class="form-label" for="date">Date</label>
                                    </div>
                                    <select class="form-select mb-4" id="hour-multi-select" name="hour[]"
                                        data-placeholder="Choose anything" multiple>
                                        @foreach ($hours as $hour)
                                            <option class="lead" value="{{ $hour->id }}">
                                                {{ date('H:i', strtotime($hour->hour)) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-1 my-4">
                                    <button type="button" id="add_row" class="btn btn-lg btn-success">+</button>
                                </div>
                            </div>

                            <div class="" id="date_row"></div>

                            <div class="d-grid gap-2 mt-3">
                                <button type="submit" class="btn btn-primary btn-block mb-4">Create Date</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script>
        $(document).ready(function() {
            $("#add_row").click(function(e) {
                e.preventDefault();
                $("#date_row").prepend(`
                    <div class="row" class="mb-4">
                        <div class="col-md-11 hour my-4">
                            <div class="form-floating mb-4">
                                <input type="date" id="date" name="date[]" class="form-control "
                                min="{{ date('Y-m-d',strtotime("tomorrow")) }}" placeholder="Date" />
                                <label class="form-label" for="date">Date</label>
                            </div>
                            <select class="form-select mb-4 hour-multi-select" name="hour[]" id=""
                                data-placeholder="Choose anything" multiple>
                                @foreach ($hours as $hour)
                                    <option class="lead" value="{{ $hour->id }}">
                                        {{ date('H:i', strtotime($hour->hour)) }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-1 my-4">
                            <button class="btn btn-lg btn-danger remove_row">-</button>
                        </div>
                    </div>
                `);

                $('.hour-multi-select').select2({
                    theme: "bootstrap-5",
                    width: $(this).data('width') ? $(this).data('width') : $(this).hasClass(
                        'w-100') ? '100%' : 'style',
                    placeholder: $(this).data('placeholder'),
                    closeOnSelect: false,
                });
            });
        });

        $(document).on("click", ".remove_row", function(e) {
            e.preventDefault();
            let row_item = $(this).parent().parent();
            $(row_item).remove();
        });
    </script>
@endsection
