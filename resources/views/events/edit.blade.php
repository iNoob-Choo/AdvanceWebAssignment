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
     {!! Form::model($event,[
       'route'=>['events.update'],
       'class'=>'form-horizontal',
       'enctype'=>'multipart/form-date',
       ])!!}

       <!-- NAME -->
       <div class="form-group row">
         {!! Form::label('event-name','Name',[
             'class' => 'control-label col-sm-3'
           ])!!}
           <div class="col-sm-9">
             {!! Form::text('name',$event->name,[
               'id' => 'event-name',
               'class' => 'form-control',
               ])!!}
           </div>
       </div>
       <!-- DESCRIPTION-->
       <div class="form-group row">
         {!!  Form::label('event-description','Description',[
           'class'=>'control-label col-sm-3'])
         !!}
         <div class="col-sm-9">
           {!! Form::textarea('description',$event->description,[
             'id' => 'club-description',
             'class'=>'form-control',
           ])
           !!}
         </div>
       </div>

       <!-- EVENT DATE-->
       <div class="form-group row">
         {!!  Form::label('event-date','Date',[
           'class'=>'control-label col-sm-3'])
         !!}
         <div class="col-sm-9">
           {!! Form::text('event_date',$event->event_date,[
             'id' => 'club-description',
             'class'=>'form-control',
           ])
           !!}
         </div>
       </div>

       <!-- EVENT DATE-->
       <div class="form-group row">
         {!!  Form::label('event-time','Time',[
           'class'=>'control-label col-sm-3'])
         !!}
         <div class="col-sm-9">
           {!! Form::text('event_time',$event->event_time,[
             'id' => 'club-description',
             'class'=>'form-control',
           ])
           !!}
         </div>
       </div>

       <!-- DURATION-->
       <div class="form-group row">
         {!!  Form::label('event-duration','Duration',[
           'class'=>'control-label col-sm-3'])
         !!}
         <div class="col-sm-9">
           {!! Form::text('duration',$event->duration,[
             'id' => 'club-description',
             'class'=>'form-control',
           ])
           !!}
         </div>
       </div>

       <!-- EVENT IMAGE-->
       <div class="form-group row">
         {!!  Form::label('event-image','Logo',[
           'class'=>'control-label col-sm-3'])
         !!}
         <div class="col-sm-9">
           {!! Form::file('image_path',[
             'id' => 'event-image',
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
