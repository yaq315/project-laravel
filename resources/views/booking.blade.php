@extends('layouts.app')

@section('content')
<section class="section-margin section-margin--small">
    <div class="container">
        <h2 class="text-center mb-5">Book Your Adventure in Wadi Rum</h2>

        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <div class="row pb-4">
            @if (!isset($adventures) || $adventures->isEmpty()))
                <div class="col-12 text-center">
                    <p>No adventures available at the moment.</p>
                </div>
            @else
                @foreach ($adventures as $adventure)
                    <div class="col-md-6 col-xl-4 mb-5">
                        <div class="card card-explore">
                            <div class="card-explore__img">
                                <img class="card-img" src="{{ asset('img/home/' . $adventure->image) }}" alt="{{ $adventure->name }}" style="height: 250px">
                            </div>
                            <div class="card-body">
                                <h3 class="card-explore__price">${{ $adventure->price }} <sub>/ Per Night</sub></h3>
                                <h4 class="card-explore__title">{{ $adventure->name }}</h4>
                                <p>{{ $adventure->description }}</p>

                                <form action="{{ route('book.adventure', $adventure->id) }}" method="POST" onsubmit="return checkAuth(event)">
                                    @csrf
                                    <div class="form-group">
                                        <label for="start_date">Start Date</label>
                                        <input type="date" name="start_date" id="start_date" class="form-control" required>
                                        @error('start_date')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="end_date">End Date</label>
                                        <input type="date" name="end_date" id="end_date" class="form-control" required>
                                        @error('end_date')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label for="group_size">Group Size</label>
                                        <input type="number" name="group_size" id="group_size" class="form-control" min="1" required>
                                        @error('group_size')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <button type="submit" class="btn btn-primary">Book Now</button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</section>
@endsection