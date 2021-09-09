@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-md-8">
        @if(session()->has('alert'))
                <div class="alert {{ session()->get('alert-type') }}" role="alert">
                    {{ session()->get('alert') }}
                </div>
            @endif
            <div class="container">
                <h3 class="mt-4">Laporan</h3>

               <div class="card-header">
                <form action="" method="">
                <div class="form-group">
                <label>Kategori : &nbsp;</label>
                        <select name="kat_ipt" id="kat_ipt">
                            <option value="1">Universiti Awam</option>
                            <option value="2">Politeknik</option>
                            <option value="3">Kolej Komuniti</option>
                            <option value="4">IPTS</option>
                        </select>
                </div>
                <div class="form-group">
                <label>Status Pelajar : &nbsp;</label>
                        <select name="nama_ipt" id="nama_ipt">
                            <option value="1">UIAM</option>
                            <option value="2">Politeknik Ungku Omar</option>
                            <option value="3">Kolej Komuniti Selayang</option>
                            <option value="4">IPTS</option>
                        </select>
                </div>
                <div class="form-group">
                <label>Negera : &nbsp;</label>
                        <select name="status" id="status">
                            <option value="1">Belum Mendaftar</option>
                            <option value="2">Belum Mendapat Tarikh</option>
                            <option value="3">Lengkap Vaksinasi</option>
                            <option value="4">1 Dos Vaksinasi</option>
                            <option value="5">2 Dos Vaksinasi</option>
                        </select> 
                        
                </div>
                <div class="form-group">
                <label>Negeri : &nbsp;</label>
                        <select name="status" id="status">
                            <option value="1">Belum Mendaftar</option>
                            <option value="2">Belum Mendapat Tarikh</option>
                            <option value="3">Lengkap Vaksinasi</option>
                            <option value="4">1 Dos Vaksinasi</option>
                            <option value="5">2 Dos Vaksinasi</option>
                        </select> <button class="btn btn-secondary" type="submit">CARI</button>
                        
                </div>
                
                </form>
                </div></BR>
                <div class="form-group">
                <h6>Bilangan Pelajar : 543 &nbsp <button class="btn btn-primary" type="submit">SENARAIKAN</button> </h6>
                </DIV>
                <div class="card-body">
               
                <table class="table">
                <tr>
                    <th colspan="9" class="align-self-center">DATA PELAJAR MALAYSIA DI LUAR NEGARA PADA : 9 SEPTEMBER 2021</th>
                </tr>         
                <tr>
                            <th>BIL</th>
                            <th>NO. KP</th>
                            <th>NAMA</th>
                            <th>BANGSA</th>
                            <th>INSTITUSI</th>
                            <th>LULUSAN</th>
                            <th>STATUS</th>
                            <th>NEGARA</th>
                            <th>STATE</th>
                            <!--<th>TINDAKAN</th>-->
                </tr>
                        <tbody>
                            @foreach ($schedules as $schedule)
                                <tr>
                                    <td>1</td>
                                    <td>768909776656</td>
                                    <td>SITI BINTI AHMAD</td>
                                    <td>MELAYU</td>
                                    <td>UNIVERSITY OF QUEENSLAND</td>
                                    <td>PHD</td>
                                    <td>AKTIF</td>
                                    <td>AUSTRALIA</td>
                                    <td>QUEENSLAND</td>
                                    <!--<td>
                                        <a href="{{ route('schedule:show', $schedule) }}" class="btn btn-primary">SHOW</a>
                                    <a href="{{ route('schedule:edit', $schedule) }}" class="btn btn-success">EDIT</a>
                                    <a onclick="return confirm('Are You Sure?')" href="{{ route('schedule:destroy', $schedule) }}" class="btn btn-danger">DELETE</a>
                                    <hr>
                                        <a onclick="return confirm('Are you sure want to force delete?')" href="{{ route('schedule:force-destroy', $schedule) }}" class="btn btn-danger">Force Delete</a>   
                                </td>  --> 
                                    
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