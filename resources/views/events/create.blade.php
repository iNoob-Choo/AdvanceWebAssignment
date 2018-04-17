<?php
use App\Club;
?>
@extends('layouts.app')
@section('stylessheets')
  {{Html::style('css\jquery.timepicker.css')}}
  {{Html::style('css\bootstrap-datepicker3.standalone.min.css')}}
@endsection
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
       'route'=>['events.store'],
       'class'=>'form-horizontal',
       'enctype'=>'multipart/form-data',
       ])!!}

       <!-- NAME -->
       <div class="form-group row">
         {!! Form::label('event-name','Name',[
             'class' => 'control-label col-sm-3'
           ])!!}
           <div class="col-sm-9">
             {!! Form::text('name',null,[
               'id' => 'event-name',
               'class' => 'form-control',
               ])!!}
           </div>
       </div>

       <!-- CLUB -->
       <div class="form-group row">
         {!! Form::label('club-id','Club',[
            'class' => 'control-label col-sm-3',
           ])!!}
           @if (Auth::user()->isA('superadmin'))
             <div class="col-sm-9">
                {!! Form::select('club_id',Club::pluck('name','id'),null,[
                   'class' => 'form-control',
                   'placeholder' => '- Select Club -',
                  ])!!}
             </div>
           @else
           <div class="col-sm-9">
              {!! Form::select('club_id',Club::where('id',Auth::user()->id)->pluck('name','id'),null,[
                 'class' => 'form-control',
                 'placeholder' => '- Select Club -',
                ])!!}
           </div>
         @endif
       </div>

       <!-- DESCRIPTION-->
       <div class="form-group row">
         {!!  Form::label('event-description','Description',[
           'class'=>'control-label col-sm-3'])
         !!}
         <div class="col-sm-9">
           {!! Form::textarea('description',null,[
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
           {!! Form::text('event_date',null,[
             'id' => 'event-date',
             'class'=>'form-control',
           ])
           !!}
         </div>
       </div>

       <!-- EVENT TIME-->
       <div class="form-group row">
         {!!  Form::label('event-time','Time',[
           'class'=>'control-label col-sm-3'])
         !!}
         <div class="col-sm-9">
           {!! Form::text('event_time',null,[
             'id' => 'event_time',
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
           {!! Form::text('duration',null,[
             'id' => 'event-duration',
             'class'=>'form-control',
           ])
           !!}
         </div>
       </div>

       <!-- EVENT IMAGE-->
       <div class="form-group row">
         {!!  Form::label('event-image','Poster',[
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

   <script type="text/javascript">
	$(document).ready(function() {


			$('#event_time').timepicker({
					'step': 60,
					'minTime': "8am",
					'maxTime': "10pm",
			});

			$('#event-date').datepicker({
					'todayHighlight':true,
          'format' : 'yyyy-mm-dd',
			});

		});

	</script>
@endsection
@section('scripts')
  <!-- Scripts -->
	{{Html::script('js\jquery.timepicker.min.js')}}
	{{Html::script('js\bootstrap-datepicker.min.js')}}
@endsection
