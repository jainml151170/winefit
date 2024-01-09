@php
        $user = Auth::user();
        $name = $user->name;
        $email = $user->email;
        $phone = $user->user_phone;
    
@endphp

@extends('distributor.index')

@section('section')
<div class="data-container m-2 ">
    <div class="row">
        <div class="col-md-8">
            @include('message')
            <div class="card">
                <div class="card-header">
                    {{ __('Account Details') }}
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <label for="account_name" class="col-md-4 col-form-label text-md-start">
                            {{ __('Name') }}
                        </label>
                        <div class="col-md-6 col-form-label text-md-start" id="account_name">
                            {{ $name }}
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="account_email" class="col-md-4 col-form-label text-md-start">
                            {{ __('Email Address') }}
                        </label>

                        <div class="col-md-6 col-form-label text-md-start" id="account_email">
                            {{ $email }}
                        </div>
                    </div>
                    
                    <div class="row mb-3">
                        <label for="account_phone" class="col-md-4 col-form-label text-md-start">
                            {{ __('Mobile Number') }}
                        </label>
                        <div class="col-md-6 col-form-label text-md-start" id="account_phone">
                            {{ $phone }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


