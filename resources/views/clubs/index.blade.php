<?php

use App\Club;
use App\Event as Events;
 ?>
@extends('layouts.app')
@section('content')

    <!-- Boostrap Boilerplate -->
    <div class="pabel-body">
      @if(count($clubs)>0)
        <table class="table table-striped task-table">
          <!-- Table Headings -->
          <thead>
            <tr>
              <th>No.</th>
              <th>Name</th>
              <th>Created</th>
              <th>Actions</th>
            </tr>
          </thead>

          <!-- Table Body -->
          <tbody>
            @foreach ($clubs as $i => $club)
              <tr>
                <td class="table-text">
                  <div >{{ $i+1 }}</div>
                </td>
                <td class="table-text">
                  <div>
                    {!! link_to_route(
                      'clubs.show',
                      $title = $club->name,
                      $parameters = [
                        'id' => $club ->id,
                      ]
                      )!!}
                  </div>
                </td>
                <td class="table-text">
                  <div>
                      {{ $club->created_at}}
                  </div>
                </td>
                <td class="table-text">
                  @can ('edit',Club::class)
                    <div>
                      {!! link_to_route(
                        'clubs.edit',
                        $title = 'Edit',
                        $parameters = [
                          'id' => $club ->id,
                        ],
                        $attributes = ['class' => 'btn btn-primary btn-block',]
                        )!!}
                    </div>
                  @endcan
                  @can ('viewMembers',Club::class)
                    <div>
                      {!! link_to_route(
                        'clubs.members',
                        $title = 'View Club Members',
                        $parameters = [
                          'id' => $club ->id,
                        ],
                        $attributes = ['class' => 'btn btn-primary btn-block',]
                        )!!}
                    </div>
                  @endcan
                  <div>
                      {!! Form::open([
                        'route' => ['join.club', $club->id],
                        'method' => 'POST',
                        'class' => 'form-horizontal'
                      ]) !!}

                      {!! Form::button('Join Club', [
                        'type' => 'submit',
                        'class' => 'btn btn-primary btn-block',
                      ]) !!}

                      {!! Form::close() !!}
                    </div>
                    @can ('view',Events::class)
                      <div>
                          {!! link_to_route(
                            'clubs.events',
                            $title = 'View Events',
                            $parameters = [
                              'id' => $club ->id,
                            ],
                            $attributes = ['class' => 'btn btn-primary btn-block',]
                            )!!}
                        </div>
                      </div>
                    @endcan
                  @if (Auth::user()->isA('superadmin'))
                    {!! Form::open([
                      'route' => ['clubs.destroy', $club->id],
                      'method' => 'destroy',
                      'class' => 'form-horizontal'
                    ]) !!}

                    {!! Form::button('Delete Club', [
                      'type' => 'submit',
                      'class' => 'btn btn-danger btn-block',
                    ]) !!}

                    {!! Form::close() !!}
                  @endif
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        <div align="center">{!!$clubs->links()!!}</div>
      @else
        <div>
          No Records Found
        </div>
      @endif
    </div>
@endsection
