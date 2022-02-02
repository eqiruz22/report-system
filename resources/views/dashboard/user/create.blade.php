@extends('layouts/template')

@section('content')
    <form action="/user/store" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">NAME</label>
            <input type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') }}">
            @if ($errors->has('name'))
                <div class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('name') }}</strong>
                </div>
            @endif
        </div>
        <div class="mb-3">
            <label for="title_id" class="form-label">JOB TITLE</label>
            <select name="title_id" id="title_id" class="form-control form-control-sm @error('title_id') is-invalid @enderror">
                <option value="" selected>-- Choose One --</option>
                @foreach ($list as $item)
                    <option value="{{ $item->id }}">{{ $item->title }}</option>                    
                @endforeach
            </select>
            @if ($errors->has('title_id'))
            <div class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('title_id') }}</strong>
            </div>
        @endif
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">EMAIL</label>
            <input type="email" class="form-control form-control-sm @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email') }}">
            @if ($errors->has('email'))
            <div class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('email') }}</strong>
            </div>
        @endif
        </div>
        <div class="mb-3">
            <label for="role" class="form-label">ROLE</label>
            <input type="role" class="form-control form-control-sm @error('role') is-invalid @enderror" id="role" name="role" value="{{ old('role') }}">
            @if ($errors->has('role'))
            <div class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('role') }}</strong>
            </div>
        @endif
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">PASSWORD</label>
            <input type="password" class="form-control form-control-sm @error('password') is-invalid @enderror" id="password" name="password">
            @if ($errors->has('password'))
            <div class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password') }}</strong>
            </div>
        @endif
        </div>
        <div class="mb-3">
            <label for="password_confirm" class="form-label">PASSWORD CONFIRM</label>
            <input type="password" class="form-control form-control-sm @error('password_confirm') is-invalid @enderror" id="password_confirm" name="password_confirm">
            @if ($errors->has('password_confirm'))
            <div class="invalid-feedback" role="alert">
                <strong>{{ $errors->first('password_confirm') }}</strong>
            </div>
        @endif
        </div>
        <button type="submit" class="btn btn-primary mb-2">Create</button>
    </form>
@endsection