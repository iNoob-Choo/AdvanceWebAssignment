<?php
use App\User;
use App\Common;
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
  <!-- Bootstrap Boilerplate... -->
<div class="panel-body">
  <!-- New User Form -->
  {!! Form::model($user, [
    'route' => ['users.store'],
    'class' => 'form-horizontal'
  ]) !!}

  <!-- NAME -->
  <div class="form-group row">
    {!! Form::label('user-name', 'Name', [
      'class' => 'control-label col-sm-3',
    ]) !!}
    <div class="col-sm-9">
      {!! Form::text('name', null, [
        'class' => 'form-control',
      ]) !!}
    </div>
  </div>

    <!-- Username -->
    <div class="form-group row">
      {!! Form::label('user-username', 'Username', [
        'class' => 'control-label col-sm-3',
      ]) !!}
      <div class="col-sm-9">
        {!! Form::text('username', null, [
          'id' => 'user-username',
          'class' => 'form-control',
        ]) !!}
      </div>
    </div>

    <!-- Password -->
    <div class="form-group row">
      {!! Form::label('guard-password', 'Password', [
        'class' => 'control-label col-sm-3',
      ]) !!}
      <div class="col-sm-9">
        {!! Form::password('password', null, [
          'id' => 'guard-password',
          'class' => 'form-control',
          'maxlength' => 20,
        ]) !!}
      </div>
    </div>

    <div class="form-group">
        <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

        <div class="col-md-6">
            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
        </div>
    </div>

    <!-- Email -->
    <div class="form-group row">
      {!! Form::label('guard-email', 'Email', [
        'class' => 'control-label col-sm-3',
      ]) !!}
      <div class="col-sm-9">
        {!! Form::email('email', null, [
          'id' => 'user-email',
          'class' => 'form-control',
        ]) !!}
      </div>
    </div>

    <!-- Role -->
        <div class="form-group row">
          {!! Form::label('user-role','Role',[
             'class' => 'control-label col-sm-3',
            ])!!}
            <div class="col-sm-9">
               {!! Form::select('role_name', Common::$roles,null,[
                  'class' => 'form-control',
                  'placeholder' => '- Select Role -',
                 ])!!}
            </div>
        </div>

    <!-- Submit Button -->
    <div class="form-group row">
      <div class="col-sm-offset-3 col-sm-6">
        {!! Form::button('Save', [
          'type' => 'submit',
          'class' => 'btn btn-primary',
        ]) !!}
      </div>
    </div>
  {!! Form::close() !!}
</div>
@endsection
