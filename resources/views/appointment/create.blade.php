@extends('layouts/app')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-10 offset-md-1">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p class="lead fs-4">Make Appointment</p>
                            </div>
                            <div class="col-md-6">
                                <a href="" class="btn btn-danger float-end">Back</a>
                            </div>
                        </div>
                        <form action="{{ route('appointment.store') }}" method="POST">
                            @csrf
                            <p id="doctor_name"></p>
                            <input type="hidden" name="doctor_id" id="doctor_id" value="">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                        <select id="appointmentDate" name="date" class="form-select form-select-lg"
                                            aria-label="Default select example">
                                            <option>Select Date</option>
                                            @foreach ($dates as $date)
                                                <option value="{{ $date->id }}">{{ $date->date }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="tab-content mt-3">
                                        <select id="hours" name="hour" class="form-select form-select-lg"
                                            size="3" aria-label="Hours">

                                        </select>
                                    </div>
                                    <div class="d-grid gap-2 mt-5">
                                        <button class="btn btn-primary" type="submit">Make Appointment</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $(window).on("load", function() {
                $("#doctor_name").html('Doctor: ' + localStorage.getItem("appointmentDoctorName"));
                $("#doctor_id").val(localStorage.getItem("appointmentDoctorId"));
            })

            $("#appointmentDate").change(function(e) {
                e.preventDefault();
                var dateId = this.value;
                $("#hours").html('');

                $.ajax({
                    url: '{{ route('getHours') }}',
                    method: "POST",
                    data: {
                        appointmentDate: dateId,
                        _token: "{{ csrf_token() }}",
                    },
                    dataType: "json",
                    success: function(result) {
                        $("#hours").html('<option value="">Select Hour</option>');
                        $.each(result.hours, function(key, value) {
                            $("#hours").append('<option value="' + value.id +
                                '"> ' + value.hour + '</option>');
                        });
                    }
                });
            });
        });
    </script>
@endsection
