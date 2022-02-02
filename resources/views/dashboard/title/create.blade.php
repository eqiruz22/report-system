@extends('layouts/template')

@section('content')
<form action="/title/store" method="POST">
    @csrf
    <div class="mb-3">
        <label for="title" class="form-label">TITLE</label>
        <input type="text" class="form-control form-control-sm @error('title') is-invalid @enderror" name="title" id="title" value="{{ old('title') }}">
        @if($errors->has('title'))
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $errors->first('title') }}</strong>
        </span>
        @endif
    </div>
    <button type="submit" class="btn btn-primary mb-2">Create</button>
</form>
@endsection