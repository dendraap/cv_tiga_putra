@extends('layouts.app', ['activePage' => 'roles', 'titlePage' => __('Manage Roles'), 'title' => __('Manage Roles')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Manage Roles</h4>
              <p class="card-category">Here is you can manage roles in CV Tiga Putra</p>
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
                  <a href="/roles/create" class="btn btn-sm btn-primary"><i class="material-icons mr-1">add</i>Add New Role</a>
                </div>
              </div>
              <div class="table-responsive">
                <table class="table">
                  <thead class=" text-primary">
                    <th>No</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th class="text-right">Actions</th>
                  </thead>
                  <tbody>
                    <tbody>
                      @foreach($roles as $role)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $role->name }}</td>
                        <td>{{ $role->description }}</td>
                        <td class="td-actions text-right">
                          <a rel="tooltip" class="btn btn-success btn-link mr-1" href="/roles/{{ $role->id }}/edit" data-original-title="" title="Edit">
                            <i class="material-icons">edit</i>
                            <div class="ripple-container">
                            </div>
                          </a>
                          <form action="/roles/{{ $role->id }}" method="post" class="d-inline">
                            @csrf
                            @method('delete')
                            <button class="btn btn-danger btn-link border-0 " onclick="return confirm('Are you sure want to delete?')"><i class="material-icons">delete</i></button>
                          </form>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
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