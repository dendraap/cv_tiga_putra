@extends('layouts.app', ['activePage' => 'products', 'titlePage' => __('Manage Products'), 'title' => __('Manage Products')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header card-header-primary">
              <h4 class="card-title">Manage Products</h4>
              <p class="card-category">Here is you can manage products in CV Tiga Putra</p>
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
                  <a href="/products/create" class="btn btn-sm btn-primary"><i class="material-icons mr-1">add</i> Add New Products</a>
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
                      @foreach($products as $product)
                      <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $product->name }}</td>
                        <td>{{ $product->description }}</td>
                        <td class="td-actions text-right">
                          <a rel="tooltip" class="btn btn-success mr-1 btn-link" href="/products/{{ $product->id }}/edit" data-original-title="" title="">
                            <i class="material-icons">edit</i>
                          </a>
                          <form action="/products/{{ $product->id }}" method="post" class="d-inline">
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