@extends('layouts.app', ['activePage' => 'dropshippers', 'titlePage' => __('Manage Dropshippers'), 'title' => __('Manage Dropshippers')])

@section('content')
<div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
            <div class="card">
              <div class="card-header card-header-primary">
                <h4 class="card-title ">Dropshippers</h4>
                <p class="card-category"> Here you can manage dropshippers in CV Tiga Putra</p>
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
                    <a href="/dropshippers/create" class="btn btn-sm btn-primary"><i class="material-icons mr-1">add</i>Add New Dropshippers</a>
                  </div>
                </div>
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Address</th>
                        <th class="text-right">Actions</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($dropshippers as $dropshipper)
                      <tr>
                          <td>{{ $loop->iteration }}</td>
                          <td>{{ $dropshipper->name }}</td>
                          <td>{{ $dropshipper->alamat }}</td>
                          <td class="td-actions text-right">
                            <a rel="tooltip" class="btn btn-success btn-link mr-1" href="/dropshippers/{{ $dropshipper->id }}/edit" title="Edit">
                              <i class="material-icons">edit</i>
                            </a>
                            <form action="/dropshippers/{{ $dropshipper->id }}" method="post" class="d-inline">
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