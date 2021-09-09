@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Car Show') }}</div>

                <div class="card-body">
                    
                        <div class="form-group">
                            <label>Model</label>
                            <input type="text" name="model" class="form-control" value="{{$car->model}}" readonly>
                        </div>
                        <div class="form-group">
                            <label>Plate Number</label>
                            <!--<textarea name="plate_number" class="form-control">{{$car->plate_number}}</textarea>-->
                            <input type="text" name="plate_number" class="form-control" value={{ $car->plate_number}}>
                        </div>
                        @if($car->attachment)
                        <div class="form-group">
                            <label>Attachment (If Any)</label>
                            <a href="{{ asset('storage/'.$car->attachment) }}" 
                            class="btn btn-warning">
                            Open this attachment: {{ $car->attachment}}</a>
                        </div>
                        @endif
                        <a class="btn btn-link" href="{{ route('car:index') }}">Back</a>
                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection