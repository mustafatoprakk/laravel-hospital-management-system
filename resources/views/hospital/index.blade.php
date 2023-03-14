@extends('/layouts/app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="row mt-5">
                    <div class="">
                        <a href="{{ route('hospital.create') }}" class="btn btn-primary float-end mb-3">Create Hospital</a>
                    </div>
                    @foreach ($hospitals as $hospital)
                        <div class="col-md-12 mb-4">
                            <div class="card shadow p-2 border-0 rounded">
                                <div class="card-body text-center shadow-4">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <a href="{{ route('hospital.edit', $hospital->id) }}"
                                                class="text-decoration-none text-dark">
                                                <div class=" ms-3">{{ ucfirst($hospital->name) }}</div>
                                            </a>
                                        </div>
                                        <div class="col-md-6">
                                            <select class="form-select" aria-label="Hospital Departments:">
                                                @foreach ($hospital->department as $department)
                                                    <option class="lead" value="{{ $department->id }}">
                                                        {{ ucfirst($department->name) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
