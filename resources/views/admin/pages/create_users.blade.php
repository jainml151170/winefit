@extends('admin.index')
@section('section')
    <div class="data-container m-2 ">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Create Users') }}</div>

                    <div class="card-body">
                        <form method="POST" action="{{ route('admin.create.users') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Name') }}</label>

                                <div class="col-md-6">
                                    <input id="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" name="name"
                                        value="{{ old('name') }}" required autocomplete="name" autofocus>

                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="email"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" name="email"
                                        value="{{ old('email') }}" required autocomplete="email">

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password"
                                        class="form-control @error('password') is-invalid @enderror" name="password"
                                        required autocomplete="new-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="password-confirm"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Confirm Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control"
                                        name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="user_phone"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Mobile Number') }}</label>

                                <div class="col-md-6">
                                    <input id="user_phone" type="tel" pattern="[0-9]{10}"
                                        class="form-control @error('user_phone') is-invalid @enderror" name="user_phone"
                                        value="{{ old('user_phone') }}" required autocomplete="user_phone" autofocus>

                                    @error('user_phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="" class="col-md-4 text-md-end">{{ __('Status') }}</label>
                                <div class="col-md-6">
                                    <div class="form-check form-check-inline @error('status') is-invalid @enderror">
                                        <input id="status1" type="radio"
                                            class="form-check-input @error('status') is-invalid @enderror" name="status"
                                            value="true">
                                        <label class="form-check-label" for="status1">True</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input id="status2" type="radio"
                                            class="form-check-input @error('status') is-invalid @enderror" name="status"
                                            value="false">
                                        <label class="form-check-label" for="status2">False</label>
                                    </div>
                                    @error('status')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            @php
                                $roles = [];
                                if (Schema::hasTable('roles')) {
                                    $roles = \App\Models\Role::getRole();
                                }
                            @endphp
                            <div class="row mb-3">
                                <label for="role"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Role') }}</label>

                                <div class="col-md-6">
                                    <select id="role" name="role"
                                        class="form-select @error('role') is-invalid @enderror">
                                        <option value>Select Role</option>
                                        @if ($roles)
                                            @foreach ($roles as $role)
                                                @php
                                                    // Replace underscores, spaces, and any other characters with spaces
                                                    $formattedRoleType = preg_replace('/[_\s]+/', ' ', $role->role_type);
                                                @endphp
                                                <option value="{{ $role->id }}">{{ $formattedRoleType }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    {{-- @if ($errors->has('role'))
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $errors->first('role') }}</strong>
                                        </span>
                                    @endif --}}
                                    @error('role')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Register') }}
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
