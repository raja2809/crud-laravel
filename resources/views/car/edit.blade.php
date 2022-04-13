@extends('layouts.template')

@section('content')
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        {{ $message }}
    </div>
    @endif
    
<h3>Edit Tempahan</h3>
<form action="{{route('car.update',$cars->id)}}" 
    method="post">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="id" value="{{$cars->id}}">
    Nama Kereta
    <input type="text" name="nama"
    class="form-control" value="{{$cars->nama}}">
    Jenis
    <input type="text" name="jenis"
    class="form-control" value="{{$cars->jenis}}">
    Kapasiti
    <input type="text" name="kapasiti"
    class="form-control" value="{{$cars->kapasiti}}">
    <button type="submit" class="btn btn-primary">Save Record
    </button>

</form>
@endsection