@extends('admin.index')
@section('section')

    <div class="data-container m-2 ">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('update Wine Machine') }}</div>

                    <div class="card-body">
                        <form method="post" action="{{ route("wine-machines.update",$wineMachine) }}">
                            @method('PUT')
                            @csrf

                            <div class="row mb-3">
                                <label for="machine_sn" class="col-md-4 col-form-label text-md-end">{{ __('Machine Serial Number') }}</label>

                                <div class="col-md-6">
                                    <input id="machine_sn" type="text"
                                        class="form-control @error('machine_sn') is-invalid @enderror" name="machine_sn"
                                        value="{{ $wineMachine->machine_sn }}" required autocomplete="machine_sn" autofocus>

                                    @error('machine_sn')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="price"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Price') }}</label>

                                <div class="col-md-6">
                                    <input id="price" type="number"
                                        class="form-control @error('price') is-invalid @enderror" name="price"
                                        value="{{ $wineMachine->price }}" required autocomplete="price">

                                    @error('price')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn btn-primary">
                                        {{ __('Update Machine') }}
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
