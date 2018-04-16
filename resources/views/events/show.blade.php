
@extends('layouts.app')
@section('content')
    <!-- Boostrap Boilerplate -->
    <div class="pabel-body">
      <div>
        <table class="table table-striped task-table">
          <!-- Table Headings -->
          <thead>
            <tr>
              <th>No.</th>
              <th>Name</th>
              <th>Description</th>
              <th>Event Time</th>
              <th>Duration</th>
              <th>Created</th>
              <th>Poster</th>
            </tr>
          </thead>

          <!-- Table Body -->
          <tbody>
              <tr>
                <td class="table-text">
                  <div >{{ $i+1 }}</div>
                </td>
                <td class="table-text">
                  <div>
                    {!! link_to_route(
                      'clubs.show',
                      $title = $event->name,
                      $parameters = [
                        'id' => $event ->id,
                      ]
                      )!!}
                  </div>
                </td>
                <td class="table-text">
                  <div>
                    {{ $event->name}}
                  </div>
                </td>
                <td class="table-text">
                  <div>
                    {{ $event->description}}
                  </div>
                </td>
                <td class="table-text">
                  <div>
                    {{ $event->event_time}}
                  </div>
                </td>
                <td class="table-text">
                  <div>
                    {{ $event->duration}}
                  </div>
                </td>
                <td class="table-text">
                  <div>
                    {{ $club->created_at}}
                  </div>
                </td>
                <td class="table-text">
                  <div>
                    @if(Storage::disk('public')->exists('eventimage/'.$event->name.'.jpg'))
                    <img src="{{$event->image_path}}" alt="{{$event->name}}">
                    @endif
                  </div>
                </td>
              </tr>
          </tbody>
        </table>
      </div>
    </div>
@endsection
