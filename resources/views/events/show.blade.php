
@extends('layouts.app')
@section('content')
    <!-- Boostrap Boilerplate -->
    <div class="pabel-body">
      <div>
        <table class="table table-striped task-table">
          <!-- Table Headings -->
          <thead>
            <tr>
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
                    {{ $event->created_at}}
                  </div>
                </td>
                <td class="table-text">
                  <div>
                    @if(Storage::disk('public')->exists('eventimage/'.$event->name.'.jpg'))
                    <img width="120" src="{{"storage/eventimage/$event->image_path"}}" alt="{{$event->name}}">
                    @endif
                  </div>
                </td>
              </tr>
          </tbody>
        </table>
      </div>
      <div>
          {!! Form::open([
            'route' => ['join.event', $event->id],
            'method' => 'POST',
            'class' => 'form-horizontal'
          ]) !!}

          {!! Form::button('Join Event', [
            'type' => 'submit',
            'id' => 'join-button',
            'class' => 'btn btn-primary',
          ]) !!}

          {!! Form::close() !!}
        </div>
        <div>
          {!! link_to_route(
            'view.participant',
            $title = 'View Participant',
            $parameters = [
              'id' => $event ->id,
            ],
            $attributes = ['class' => 'btn btn-info',]
            )!!}
        </div>
    </div>
     <a class="btn btn-info" href="{{ URL::previous() }}">Back</a>
@endsection
