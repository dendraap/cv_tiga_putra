@extends('layouts.app', ['activePage' => 'user-management', 'titlePage' => __('Manage Employees'), 'title' => __('Manage Employees')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">Employees</h4>
                <p class="card-category"> Here you can manage employees in CV Tiga Putra</p>
              </div>
              <div class="card-body">
                @if (session('status'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>    
                @endif
                <div class="row">
                  <div class="col-12 text-right">
                    <a href="/user/create" class="btn btn-sm btn-primary"><i class="material-icons mr-1">add</i>Add New Employees</a>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Phone Number</th>
                        <th>Creation date</th>
                        <th class="text-right">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($users as $user)
                      <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $user->name }}</td>
                          <td>{{ $user->email }}</td>
                          <td>{{ $user->role }}</td>
                          <td>{{ $user->telepon }}</td>
                          <td>{{ $user->created_at }}</td>
                          <td class="td-actions text-right">
                            <a rel="tooltip" class="btn btn-success mr-1 btn-link" href="/user/{{ $user->id }}/edit" data-original-title="" title="">
                              <i class="material-icons">edit</i>
                            </a>
                            <form action="/user/{{ $user->id }}" method="post" class="d-inline">
                              @csrf
                              @method('delete')
                              <button class="btn btn-danger btn-link border-0 " onclick="return confirm('Are you sure want to delete?')"><i class="material-icons">delete</i></button>
                            </form>
                          </td>
                        </tr>
                        @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection
