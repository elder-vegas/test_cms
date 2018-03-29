@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Изменить пароль') }}</div>

                <div class="card-body">
                    <form method="POST" action="/profile/password/change">
                        @csrf

                        <div class="form-group row">
                            <label for="password_old" class="col-md-4 col-form-label text-md-right">{{ __('Старый пароль:') }}</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control{{ $errors->has('password_old') ? ' is-invalid' : '' }}" name="password_old" required>

                                @if ($errors->has('password_old'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password_old') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password_new" class="col-md-4 col-form-label text-md-right">{{ __('Новый пароль:') }}</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control{{ $errors->has('password_new') ? ' is-invalid' : '' }}" name="password_new" required>

                                @if ($errors->has('password_new'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password_new') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password_new_confirmation" class="col-md-4 col-form-label text-md-right">{{ __('Повторите новый пароль:') }}</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_new_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Сохранить') }}
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
