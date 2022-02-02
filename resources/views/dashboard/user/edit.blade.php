@extends('layouts/template')

@section('content')
<form action="/title/update/{{ $data->id }}" method="POST">
@method('put')
@csrf
<div class="mb-3">
    <label for="name" class="form-label">NAME</label>
    <input type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $data->name) }}">
    @if($errors->has('name'))
        <div class="invalid-feedback">
            <strong>{{ $errors->first('name') }}</strong>
        </div>
    @endif
</div>
<div class="mb-3">
    <label for="title_id" class="form-label">JOB TITLE</label>
   <select name="title_id" id="title_id" class="form-control form-control-sm">
       <option value="">-- Choose one --</option>
        @foreach ($list as $item)
            @if (old('title_id', $data->title_id == $item->id))
            <option value="{{ $item->id }}" selected>{{ $item->title }}</option>
            @else
            <option value="{{ $item->id }}">{{ $item->title }}</option>
            @endif
        @endforeach
   </select>
    @if ($errors->has('title_id'))
        <div class="invalid-feedback">
            <strong>{{ $errors->first('title_id') }}</strong>
        </div>
    @endif
</div>
<div class="mb-3">
    <label for="email" class="form-label">EMAIL</label>
    <input type="email" class="form-control form-control-sm @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $data->email) }}">
    @if ($errors->has('email'))
        <div class="invalid-feedback">
            <strong>{{ $errors->first('email') }}</strong>
        </div>
    @endif
</div>
<button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection