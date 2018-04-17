
@extends('layouts.app')
@section('content')

    <!-- Boostrap Boilerplate -->
    <div class="pabel-body">
      @if(count($users)>0)
        <table class="table table-striped task-table">
          <!-- Table Headings -->
          <thead>
            <tr>
              <th>No.</th>
              <th>Name</th>
              <th>Username</th>
              <th>Created</th>
              <th>Actions</th>
            </tr>
          </thead>

          <!-- Table Body -->
          <tbody>
            @foreach ($users as $i => $user)
              <tr>
                <td class="table-text">
                  <div >{{ $i+1 }}</div>
                </td>
                <td class="table-text">
                  <div>
                    {!! link_to_route(
                      'users.show',
                      $title = $user->name,
                      $parameters = [
                        'id' => $user ->id,
                      ]
                      )!!}
                  </div>
                </td>
                <td class="table-text">
                  <div>
                    {{ $user->username}}
                  </div>
                </td>
                <td class="table-text">
                  <div>
                    {{ $user->created_at}}
                  </div>
                </td>
                <td class="table-text">
                  <div>
                    {!! link_to_route(
                      'users.edit',
                      $title = 'Edit',
                      $parameters = [
                        'id' => $user ->id,
                      ]
                      )!!}
                  </div>
                  <div>
									{!! Form::open([
										'route' => ['users.destroy', $user->id],
										'method' => 'DELETE',
										'class' => 'form-horizontal'
									]) !!}

									{!! Form::button('Delete', [
										'type' => 'submit',
										'class' => 'btn btn-danger btn-block',
									]) !!}

									{!! Form::close() !!}
								</div>
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
        <div align="center">{!!$users->links()!!}</div>
      @else
        <div>
          No Records Found
        </div>
      @endif
    </div>
@endsection
