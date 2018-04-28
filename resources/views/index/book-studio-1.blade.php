@extends('layouts.header-footer')

@section('body')

<div class="content-wrapper">
  <div class="container-fluid">
    <table class="table table-bordered" >
      <thead>
        <tr class="success">
          @foreach($dates as $i => $date)
          <th>{{$date}}</th>
          @endforeach
        </tr>
      </thead>
      <tbody>
        <tr>@foreach($dates as $i => $date)<td>08.00</td>@endforeach</tr>
      </tbody>
    </table>
  </div>
</div>
    
@endsection