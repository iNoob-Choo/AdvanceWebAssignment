
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
                    {{ $club->name}}
                  </div>
                </td>
                <td class="table-text">
                  <div>
                    {{ $club->created_at}}
                  </div>
                </td>
                <td class="table-text">
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
                </td>
                {{-- <td class="table-text">
                  <div>
                    {!! link_to_route(
                      'member.joingroup',
                      $title = 'Join Group',
                      $parameters = [
                        'id' => $member ->id,
                      ]
                      )!!}
                  </div>
                </td>
                <td class="table-text">
                  <div>
                    {!! link_to_route(
                      'member.showgroups',
                      $title = 'Show Groups',
                      $parameters = [
                        'id' => $member ->id,
                      ]
                      )!!}
                  </div>
                </td> --}}
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
