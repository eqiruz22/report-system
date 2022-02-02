@extends('layouts/template')

@section('content')
    <form action="/user/update-password/{{ $data->id }}" method="POST">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="password" class="form-label">PASSWORD</label>
            <input type="password" class="form-control form-control-sm @error('password') is-invalid @enderror" id="password" name="password">
            @error('password')
                <div class="invalid-feedback" role="alert">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="password_confirm" class="form-label">PASSWORD CONFIRM</label>
            <input type="password" class="form-control form-control-sm @error('password_confirm') is-invalid @enderror" id="password_confirm" name="password_confirm">
            @error('password_confirm')
                <div class="invalid-feedback" role="alert">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary mb-2">Update</button>
    </form>
@endsection