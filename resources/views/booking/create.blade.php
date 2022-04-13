@extends('layouts.template')

@section('content')
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        {{ $message }}
    </div>
    @endif
    
<h3>Sila Booking</h3>
<form action="{{route('booking.store')}}" method="post">
    @csrf
    Nama
    <select class="form-control" name="nama">
    @foreach ($users as $user)
   <option value="{{ $user->id }}">{{$user->name}} </option>   
@endforeach
</select>
    Tarikh Tempah
    <input type="date" name="tarikh_tempah"
    class="form-control">
    Kereta
    <select class="form-control" name="kereta">
    @foreach ($cars as $car)
   <option value="{{ $car->id }}">{{$car->nama}} </option>   
@endforeach
</select>
    

    <button type="submit" class="btn btn-primary">Save Record
    </button>

    <td><a href="{{route('booking.index')}}" 
            class="btn btn-primary">Back 
            <i class="fas fa-edit"></i> </a>
        </td>

</form>


@endsection