
@extends('layouts.app')

@section('content')

 <!-- Bootstrap Boilerplate... -->

 <div class="panel-body">
 <table class="table table-striped task-table">
 <!-- Table Headings -->
 <thead>
 <tr>
 <th>No.</th>
 <th>Particiapnt</th>
 </tr>
 </thead>
 <!-- Table Body -->
 <tbody>
    @foreach ($event->users as $i => $member)
    <tr>
      <td class="table-text">
        <div >{{ $i+1 }}</div>
      </td>
      <td class="table-text">
        <div >{{ $member->name}}</div>
      </td>
    </tr>
    @endforeach
 </tbody>
 </table>
 <a class="btn btn-info" href="{{ URL::previous() }}">Back</a>
 </div>

 @endsection
