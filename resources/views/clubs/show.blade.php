
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
              <th>Created</th>
              <th>Logo</th>
            </tr>
          </thead>

          <!-- Table Body -->
          <tbody>
              <tr>
                <td class="table-text">
                  {{$club->name}}
                </td>
                <td class="table-text">
                  <div>
                    {{ $club->description}}
                  </div>
                </td>
                <td class="table-text">
                  <div>
                    {{ $club->created_at}}
                  </div>
                </td>
                <td class="table-text">
                  <div>
                    @if(Storage::disk('public')->exists('clublogo/'.$club->name.'.jpg'))
                    <img  width="120" src="{{"storage/clublogo/$club->club_logo_path"}}" alt="{{$club->name}}">
                    @endif
                  </div>
                </td>
              </tr>
          </tbody>
        </table>
      </div>
      @can('view-members',App\Club::class)
        <div>
          {!! link_to_route(
            'clubs.showmembers',
            $title = 'Show Members',
            $parameters = [
              'id' => $club ->id,
            ]
            )!!}
        </div>
      @endcan

    </div>
@endsection
