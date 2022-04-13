@extends('layouts.template')

@section('content')

<br>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        {{ $message }}
    </div>
    @endif
    
   


<div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary"></h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="tblData" width="100%" cellspacing="0">
                                <tr class="header">
        <th>Nama</th>
        <th>Tarikh Tempah</th>
        <th>Kereta</th>
        <th>Edit</th>
        <th>Delete</th>
      
    @foreach ($bookings as $booking)
    
    <tr>
    <tbody>
    <td class="block">{{ $booking->user->name ?? '' }}</td>
    <td class="block">{{ $booking->tarikh_tempah }}</td>
    <td class="block">{{ $booking->car->nama }}</td>
  
        <td><a href="{{route('booking.edit',$booking->id)}}" 
            class="btn btn-success">
            <i class="fas fa-edit"></i> </a>
        </td>
        <td>
            <form method="POST" 
            action="{{route('booking.destroy',$booking->id)}}">
            @csrf
            <input type="hidden" name="_method" value="DELETE">
            <button class="btn btn-danger"
            onclick="return confirm('Are you sure to delete the record?')">
            
            <i class="fas fa-trash"></i> </button>
            </form>
        </td>
</tbody>
        
    
    </tr>
    
    @endforeach

    <a href="{{route('booking.create')}}" 
            class="btn btn-primary" style="margin-right:500px;">Create New 
            <i class="fas fa-edit"></i> </a>

            
  
            
        
</table>

{{ $bookings->links('pagination::bootstrap-4') }}



@endsection

