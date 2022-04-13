@extends('layouts.template')

@section('content')
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        {{ $message }}
    </div>
    @endif
    
<h3>Edit existing record</h3>
<form action="{{route('booking.update',$bookings->id)}}" 
    method="post">
    @csrf
    <input type="hidden" name="_method" value="PUT">
    <input type="hidden" name="id" value="{{$bookings->id}}">
    
    
    Nama 
    <input type="text" name="nama"
    class="form-control" value="{{$bookings->nama}}">
    Tarikh Tempah
    <input type="text" name="tarikh_tempah"
    class="form-control" value="{{$bookings->tarikh_tempah}}">
    Kereta
    <input type="text" name="kereta"
    class="form-control" value="{{$bookings->kereta}}">
    <button type="submit" class="btn btn-primary">Save Record
    </button>

</form>
@endsection