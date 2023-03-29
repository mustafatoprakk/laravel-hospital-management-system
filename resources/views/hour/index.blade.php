@extends('/layouts/app')

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-8 offset-md-2">
                <div class="row mt-5">
                    <div class="">
                        <a href="{{ route('hour.create') }}" class="btn btn-primary float-end mb-3">Create
                            Hour</a>
                    </div>
                    @foreach ($hours as $hour)
                        <div class="col-md-12 mb-4">
                            <div class="card shadow p-1 border-0 rounded">
                                <div class="card-body text-center">{{ ucfirst($hour->hour) }}</div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
@endsection
