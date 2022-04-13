@extends('layouts.template')

@section('content')
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        {{ $message }}
    </div>
    @endif
    
<h3>Tempah Kereta</h3>
<form action="{{route('car.store')}}" method="post">
    @csrf
    Nama Kereta
    <input type="text" name="nama"
    class="form-control">
    Jenis Kereta
    <input type="text" name="jenis"
    class="form-control">
    Kapasiti
    <input type="text" name="kapasiti"
    class="form-control">
    

    <button type="submit" class="btn btn-primary">Save Record
    </button>

    <td><a href="{{route('car.index')}}" 
            class="btn btn-primary">Back 
            <i class="fas fa-edit"></i> </a>
        </td>

</form>


@endsection