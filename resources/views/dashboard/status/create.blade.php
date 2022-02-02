@extends('layouts/template')

@section('content')
<form action="/status/store" method="POST">
    @csrf
    <div class="mb-3">
        <label for="status" class="form-label">STATUS</label>
        <input type="text" class="form-control form-control-sm @error('stats') is-invalid @enderror" name="stats" id="stats" value="{{ old('stats') }}">
        @if($errors->has('stats'))
        <span class="invalid-feedback d-block" role="alert">
            <strong>{{ $errors->first('stats') }}</strong>
        </span>
        @endif
    </div>
    <button type="submit" class="btn btn-primary mb-2">Create</button>
</form>
@endsection