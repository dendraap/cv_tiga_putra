@extends('layouts.app', ['activePage' => 'user-management', 'titlePage' => __('Edit Employees - Manage Employees'), 'title' => __('Edit Employees - Manage Employees')])

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <form method="post" action="/user/{{ $user->id }}" class="form-horizontal">
                    @csrf
                    @method('put')
                    <div class="card">
                        <div class="card-header card-header-primary">
                            <h4 class="card-title">Edit Employees</h4>
                            <p class="card-category">Here is you can edit employees in CV Tiga Putra</p>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-12 text-right">
                                  <a href="/user" class="btn btn-sm btn-danger"><i class="material-icons mr-1">arrow_back</i>Back to list</a>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Name') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" id="input-role-name" type="text" placeholder="{{ __('') }}" required value="{{ old('name', $user->name) }}"/>
                                        @if ($errors->has('name'))
                                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('name') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Email') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" id="input-email" type="email" placeholder="{{ __('') }}" required value="{{ old('email', $user->email) }}"/>
                                        @if ($errors->has('email'))
                                        <span id="email-error" class="error text-danger" for="input-email">{{ $errors->first('email') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Role') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('role') ? ' has-danger' : '' }}">
                                        <select class="custom-select" name="role">
                                            <option selected disabled>--Open this select menu--</option>
                                            @foreach($options as $option)
                                                @if(old('name') == $option->name )
                                                    <option value="{{ $option->name }}" selected>{{ $option->name }}</option>
                                                @else 
                                                    <option value="{{ $option->name }}">{{ $option->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                        @if ($errors->has('role'))
                                        <span id="role" class="error text-danger" for="role">{{ $errors->first('role') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Phone Number') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('telepon') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('telepon') ? ' is-invalid' : '' }}" name="telepon" id="telepon" type="text" placeholder="{{ __('') }}" required value="{{ old('telepon', $user->telepon) }}"/>
                                        @if ($errors->has('telepon'))
                                        <span id="telepon" class="error text-danger" for="telepon">{{ $errors->first('telepon') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Password') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('telepon') ? ' is-invalid' : '' }}" name="password" id="password" type="password" placeholder="{{ __('') }}" required/>
                                        @if ($errors->has('password'))
                                        <span id="password" class="error text-danger" for="password">{{ $errors->first('password') }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <label class="col-sm-2 col-form-label">{{ __('Confirm Password') }}</label>
                                <div class="col-sm-7">
                                    <div class="form-group{{ $errors->has('password_confirmation') ? ' has-danger' : '' }}">
                                        <input class="form-control{{ $errors->has('password_confirmation') ? ' is-invalid' : '' }}" name="password_confirmation" id="password_confirmation" type="password" placeholder="{{ __('') }}" required/>
                                        @if ($errors->has('password_confirmation'))
                                        <span id="password_confirmation" class="error text-danger" for="password_confirmation">{{ $errors->first('password_confirmation') }}</span>
                                        @endif
                                     </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-footer ml-auto mr-auto">
                            <button type="submit" class="btn btn-primary">{{ __('ADD') }}</button>
                          </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection