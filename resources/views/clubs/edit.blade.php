<?php
use App\User;
 ?>
@extends('layouts.app')
@section('content')
  @if ($errors->any())
    <div class="alert alert-danger">
      <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif
  <!-- Boostrap Boilerplate -->
   <div class="panel-body">
     <!-- New Division Form -->
     {!! Form::model($club,[
       'route'=>['clubs.update',$club->id],
       'method'=>'PUT',
       'class'=>'form-horizontal',
       'enctype'=>'multipart/form-data',
       ])!!}

       <!-- NAME -->
       <div class="form-group row">
         {!! Form::label('club-name','Name',[
             'class' => 'control-label col-sm-3'
           ])!!}
           <div class="col-sm-9">
             {!! Form::text('name',$club->name,[
               'id' => 'club-name',
               'class' => 'form-control',
               ])!!}
           </div>
       </div>
       <!-- DESCRIPTION-->
       <div class="form-group row">
         {!!  Form::label('club-description','Description',[
           'class'=>'control-label col-sm-3'])
         !!}
         <div class="col-sm-9">
           {!! Form::textarea('description',$club->description,[
             'id' => 'club-description',
             'class'=>'form-control',
           ])
           !!}
         </div>
       </div>
       @if(Auth::user()->isA('superadmin'))
       <!-- CHAIRPERSON -->
      <div class="form-group row">
        {!! Form::label('chairperson_id', 'Chairperson', [
          'class' => 'control-label col-sm-3',
        ]) !!}
        <div class="col-sm-9">
          {!! Form::select('chairperson_id',
          User::where('role_name','!=',3)->pluck('name','id'),
          null, [
            'id' => 'select2-form',
            'class' => 'form-control',
            'placeholder' => '- Select Student -',
          ]) !!}
        </div>
      </div>
      @endif
       <!-- CLUB LOGO-->
       <div class="form-group row">
         {!!  Form::label('club-logo','Logo',[
           'class'=>'control-label col-sm-3'])
         !!}
         <div class="col-sm-9">
           {!! Form::file('club_logo_path',[
             'id' => 'club-logo',
             'class'=>'form-control',
           ])
           !!}
         </div>
       </div>


       <!-- Submit Button -->
       <div class="form-group row">
         <div class="col-sm-offset-3 col-sm-6">
           {!! Form::button('Save',[
              'type' => 'submit',
              'class' => 'btn btn-primary'
             ])!!}
         </div>
       </div>

     {!! Form::close() !!}
   </div>
@endsection
