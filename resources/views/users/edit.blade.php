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
  <!-- New Guard Form -->
  {!! Form::model($user, [
    'route' => ['users.update',$user->id],
    'class' => 'form-horizontal',
    'method' =>'PUT',

  ]) !!}

  <!-- NAME -->
  <div class="form-group row">
    {!! Form::label('user-name', 'Name', [
      'class' => 'control-label col-sm-3',
    ]) !!}
    <div class="col-sm-9">
      {!! Form::text('name', $user->name, [
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
        {!! Form::text('username', $user->username, [
          'id' => 'guard-username',
          'class' => 'form-control',
          'readonly' => true,
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
        {!! Form::email('email', $user->email, [
          'id' => 'guard-email',
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
               {!! Form::select('role_name', Common::$roles,$user->role_name,[
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
