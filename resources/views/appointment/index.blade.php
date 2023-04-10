@extends('layouts/app')

@section('content')
    <div class="container" style="margin-top: 10%">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <a class="text-decoration-none text-dark" data-bs-toggle="modal" href="#appointmentModal" role="button">
                    <div class="card shadow p-3 mb-5 bg-primary text-white rounded">
                        <div class="card-body text-center">
                            <span class="fs-2 font-monospace">Make an Appointment</span>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
    <!--Appointment Modal-->
    <div class="modal fade" id="appointmentModal" aria-hidden="true" aria-labelledby="exampleModalToggleLabel"
        tabindex="-1">
        <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fw-bold" id="exampleModalToggleLabel">Make an Appointment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('appointment.create') }}" method="get">
                    @csrf
                    <div class="modal-body">
                        <!-- Hospital input -->
                        <div class="form-floating m-3">
                            <select id="hospital" name="hospital" class="form-select mb-4" aria-label="Hospital">
                                <option selected>Select Hospital</option>
                                @foreach ($hospitals as $hospital)
                                    <option value="{{ $hospital->id }}">{{ strtoupper($hospital->name) }}
                                    </option>
                                @endforeach
                            </select>
                            <label for="hospital">Select Hospital</label>
                        </div>
                        <!-- Department input -->
                        <div class="form-floating m-3">
                            <select id="department" name="department" class="form-select mb-4" aria-label="Department">
                            </select>
                            <label for="department">Your Department</label>
                        </div>
                        <div class="form-floating mb-3 mx-3">
                            <select id="doctor" name="doctor" class="form-select" aria-label="Doctor">

                            </select>
                            <label for="doctor">Select Doctor</label>
                        </div>
                        <!--<div class="form-floating mb-3 mx-3">
                                                                <input type="date" name="date" id="date" class="form-select">
                                                                <label for="doctor">Select Doctor</label>
                                                            </div>-->


                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" data-bs-toggle="modal">Result Appointment</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--End Modal-->
@endsection
