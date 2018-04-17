
<?php use App\Event as Events;?>
@extends('layouts.app')
@section('content')

    <!-- Boostrap Boilerplate -->
    <div class="pabel-body">
      @if(count($club)>0)
        <table class="table table-striped task-table">
          <!-- Table Headings -->
          <thead>
            <tr>
              <th>No.</th>
              <th>Name</th>
              <th>Created</th>
              @can('edit',Events::class)
              <th>Actions</th>
              @endcan
            </tr>
          </thead>

          <!-- Table Body -->
          <tbody>
            @foreach ($club->events as $i => $event)
              <tr>
                <td class="table-text">
                  <div >{{ $i+1 }}</div>
                </td>
                <td class="table-text">
                  <div>
                    {!! link_to_route(
                      'events.show',
                      $title = $event->name,
                      $parameters = [
                        'id' => $event ->id,
                      ]
                      )!!}
                  </div>
                </td>
                <td class="table-text">
                  <div>
                    {{ $event->created_at}}
                  </div>
                </td>

                  @can('edit',Events::class)
                  <td class="table-text">
                  <div>
                    {!! link_to_route(
                      'events.edit',
                      $title = 'Edit',
                      $parameters = [
                        'id' => $event ->id,
                      ],
                      $attributes = ['class' => 'btn btn-primary btn-block',]
                      )!!}
                  </div>
                  </td>
                  @endcan

              </tr>
            @endforeach
          </tbody>
        </table>
      @else
        <div>
          No Records Found
        </div>
      @endif
    </div>
@endsection
