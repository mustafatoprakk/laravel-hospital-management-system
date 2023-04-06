@extends('layouts/app')

@section('content')
    <div class="container">
        <div class="row mt-5">
            <div class="col-md-10 offset-md-1">
                <div class="card">
                    <div class="card-body">
                        <p class="lead fs-4">Make Appointment</p>
                        <p class="fs-5">Doctor: {{ strtoupper($doctor->name) }}</p>
                        <div class="row">
                            <div class="col-md-8">
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <select id="appointmentDate" class="form-select form-select-lg"
                                        aria-label="Default select example">
                                        <option>Select Date</option>
                                        @foreach ($dates as $date)
                                            <option value="{{ $date->id }}">{{ $date->date }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="tab-content mt-3">
                                    <select id="hours" name="hours" class="form-select form-select-lg" size="3"
                                        aria-label="Hours">

                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
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
