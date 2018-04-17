<?php use App\User; ?>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Main Page</div>

                @can ('create',User::class)
                  <a href="{{route('users.create')}}">Create Member</a>
                @endcan


            </div>
        </div>
    </div>
</div>
@endsection
