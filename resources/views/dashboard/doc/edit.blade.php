@extends('layouts/template')

@section('content')
    <form action="/document/update/{{ $data->id }}" method="POST" enctype="multipart/form-data">
        @method('put')
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Name Documents</label>
            <input type="text" name="name" class="form-control form-control-sm" value="{{ old('name', $data->name) }}">
            @error('name')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="filedocs" class="form-label">Document</label>
                <input type="hidden" name="oldDocs" value="{{ $data->filedocs }}">
                <input type="file" class="form-control form-control-sm @error('filedocs') is-invalid @enderror" name="filedocs" id="filedocs">
                @if ($errors->has('filedocs'))
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $errors->first('filedocs') }}</strong>
                </span>
            @endif
        </div>
        <button type="submit" class="btn btn-primary mb-2">Save</button>
    </form>
@endsection