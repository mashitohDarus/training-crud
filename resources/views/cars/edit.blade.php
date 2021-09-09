@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Car Edit') }}</div>

                <div class="card-body">
                    <form action="{{ route('car:update', $car)}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Model</label>
                            <input type="text" name="model" class="form-control" value={{ $car->model}}>
                        </div>
                        <div class="form-group">
                            <label>Plate Number</label>
                            <!--<textarea name="plate_number" class="form-control">{{ $car->plate_number }}</textarea>-->
                            <input type="text" name="plate_number" class="form-control" value={{ $car->plate_number}}>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update Car</button>
                            <a class="btn btn-link" href="{{ route('car:index') }}">Back</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection