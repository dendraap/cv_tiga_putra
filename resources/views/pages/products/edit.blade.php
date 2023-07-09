@extends('layouts.app', ['activePage' => 'products', 'titlePage' => __('Edit Products - Manage Dropshippers'), 'title' => __('Edit Products - Manage Products')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="/products/{{ $product->id }}" class="form-horizontal">
                    @csrf
                    @method('put')
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Edit Products</h4>
                            <p class="card-category">Here is you can edit products in CV Tiga Putra</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                  <a href="/products" class="btn btn-sm btn-danger"><i class="material-icons mr-1">arrow_back</i>Back to list</a>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} text-gray" name="name" id="input-role-name" type="text" placeholder="{{ __('') }}" required value="{{ old('name', $product->name) }}"/>
                                        @if ($errors->has('name'))
                                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Description') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('description') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('description') ? ' is-invalid' : '' }}" name="description" id="description" type="textarea" placeholder="{{ __('') }}" required value="{{ old('description', $product->description) }}"/>
                                        @if ($errors->has('description'))
                                        <span id="description-error" class="error text-danger" for="description">{{ $errors->first('description') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ml-auto mr-auto">
                            <button type="submit" class="btn btn-primary">{{ __('SAVE') }}</button>
                          </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection