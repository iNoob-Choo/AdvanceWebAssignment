
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
              <th>Email</th>
              <th>Created</th>
            </tr>
          </thead>

          <!-- Table Body -->
          <tbody>
              <tr>
                <td class="table-text">
                  <div>
                    {{ $user->name}}
                  </div>
                </td>
                <td class="table-text">
                  <div>
                    {{ $user->email}}
                  </div>
                </td>
                <td class="table-text">
                  <div>
                    {{ $user->created_at}}
                  </div>
                </td>
              </tr>
          </tbody>
        </table>
      </div>
    </div>
@endsection
