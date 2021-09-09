@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @if(session()->has('alert'))
                <div class="alert {{ session()->get('alert-type') }}" role="alert">
                    {{ session()->get('alert') }}
                </div>
            @endif
            <div class="card">
                <div class="card-header">{{ __('Car Index') }}</div>

                <div class="card-body">
                    <table class="table">
                        <thead>
                            <th>ID</th>
                            <th>MODEL</th>
                            <th>Creator</th>
                            <th>Action</th>
                           
                        </thead>
                        <tbody>
                            @foreach ($cars as $car)
                                <tr>
                                    <td>{{$car->id}}</td>
                                    <td>{{$car->model}}</td>
                                    <td>{{$car->user->name}}</td>
                                    <td>
                                        <a href="{{ route('car:show', $car) }}" class="btn btn-primary">SHOW</a>
                                    <a href="{{ route('car:edit', $car) }}" class="btn btn-success">EDIT</a>
                                    <a onclick="return confirm('Are You Sure?')" href="{{ route('car:destroy', $car) }}" class="btn btn-danger">DELETE</a>
                                    </td> 
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{ $cars->links() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection