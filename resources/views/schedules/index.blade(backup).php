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
                <!--<div class="card-header">
                    {{ __('Schedule Index') }}
                <div class="float-right">
                    <form action="" method="">
                        <div class="input-group">
                            <input type="text" class="form-control" name="keyword" value="{{ request()->get('keyword')}}">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">SEARCH</button>
                            </div>
                        </div>
                    </form>
                </div>
                </div>-->
                <h2>Laporan Vaksinasi Pelajar IPT</h2>
                <div class="card-header">
                <form action="" method="">
                <div class="form-group">
                <label>Jenis IPT : &nbsp;</label>
                        <select name="kat_ipt" id="kat_ipt">
                            <option value="1">Universiti Awam</option>
                            <option value="2">Politeknik</option>
                            <option value="3">Kolej Komuniti</option>
                            <option value="4">IPTS</option>
                        </select>
                </div>
                <div class="form-group">
                <label>Nama IPT : &nbsp;</label>
                        <select name="nama_ipt" id="nama_ipt">
                            <option value="1">UIAM</option>
                            <option value="2">Politeknik Ungku Omar</option>
                            <option value="3">Kolej Komuniti Selayang</option>
                            <option value="4">IPTS</option>
                        </select>
                </div>
                <div class="form-group">
                <label>Status Vaksinasi : &nbsp;</label>
                        <select name="status" id="status">
                            <option value="1">Belum Mendaftar</option>
                            <option value="2">Belum Mendapat Tarikh</option>
                            <option value="3">Lengkap Vaksinasi</option>
                            <option value="4">1 Dos Vaksinasi</option>
                            <option value="5">2 Dos Vaksinasi</option>
                        </select> <button class="btn btn-primary" type="submit">CARI</button>
                        
                </div>
                
                </form>
                </div>

                <div class="card-body">
                <table class="table">
                        <thead>
                            <th>IPT</th>
                            <th>NO. MATRIK</th>
                            <th>NAMA</th>
                            <th>STATUS VAKSINASI</th>
                            <th>TINDAKAN</th>
                        </thead>
                        <tbody>
                            @foreach ($schedules as $schedule)
                                <tr>
                                    <td>UIAM</td>
                                    <td>UIAM12345</td>
                                    <td>SITI BINTI AHMAD</td>
                                    <td>LENGKAP VAKSINASI</td>
                                    <td>
                                        <a href="{{ route('schedule:show', $schedule) }}" class="btn btn-primary">SHOW</a>
                                    <a href="{{ route('schedule:edit', $schedule) }}" class="btn btn-success">EDIT</a>
                                    <!--<a onclick="return confirm('Are You Sure?')" href="{{ route('schedule:destroy', $schedule) }}" class="btn btn-danger">DELETE</a>
                                    <hr>
                                        <a onclick="return confirm('Are you sure want to force delete?')" href="{{ route('schedule:force-destroy', $schedule) }}" class="btn btn-danger">Force Delete</a>   --> 
                                </td>   
                                    
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    <!--<table class="table">
                        <thead>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Description</th>
                            <th>Creator</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach ($schedules as $schedule)
                                <tr>
                                    <td>{{$schedule->id}}</td>
                                    <td>{{$schedule->title}}</td>
                                    <td>{{$schedule->description}}</td>
                                    <td>{{$schedule->user->name}}</td>
                                    <td>
                                        <a href="{{ route('schedule:show', $schedule) }}" class="btn btn-primary">SHOW</a>
                                    <a href="{{ route('schedule:edit', $schedule) }}" class="btn btn-success">EDIT</a>
                                    <a onclick="return confirm('Are You Sure?')" href="{{ route('schedule:destroy', $schedule) }}" class="btn btn-danger">DELETE</a>
                                    <hr>
                                        <a onclick="return confirm('Are you sure want to force delete?')" href="{{ route('schedule:force-destroy', $schedule) }}" class="btn btn-danger">Force Delete</a>    
                                </td>   
                                    
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{ $schedules->appends(['keyword' => request()->get('keyword')])->links() }}-->
                </div>
            </div>
        </div>
    </div>
</div>
@endsection