<?php
 use App\User;
 use App\Club;
 use App\Event as Events;
  ?>
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Main Page</div>
                  <ul>
                    <li>
                      @can ('create',User::class)
                        <a href="{{route('users.create')}}">Create Member</a>
                      @endcan
                    </li>
                    <li>
                      @can ('view',User::class)
                        <a href="{{route('users.index')}}">View All Member</a>
                      @endcan
                    </li>
                    <li>
                      @can ('view',Club::class)
                        <a href="{{route('clubs.index')}}">View Club</a>
                      @endcan
                    </li>
                    <li>
                      @can ('create',Club::class)
                        <a href="{{route('clubs.create')}}">Create Club</a>
                      @endcan
                    </li>
                    <li>
                      @can ('view',Events::class)
                        <a href="{{route('events.index')}}">View Events</a>
                      @endcan
                    </li>
                    <li>
                      @can ('create',Events::class)
                        <a href="{{route('events.create')}}">Create Events</a>
                      @endcan
                    </li>
                  </ul>


            </div>
        </div>
    </div>
</div>
@endsection
