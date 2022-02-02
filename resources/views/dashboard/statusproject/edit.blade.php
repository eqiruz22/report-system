@extends('layouts/template')

@section('content')
<form action="/status-project/update/{{ $data->id }}" method="POST">
@method('put')
@csrf
@auth
    <input type="hidden" name="user_id" value="{{ old('user_id',auth()->user()->id) }}">
@endauth
<div class="mb-3">
    <label for="prj">PRJ</label>
    <select class="form-control form-control-sm @error('report_id') is-invalid @enderror" name="report_id" id="report_id">
        <option value="">-- Choose one --</option>
        @foreach ($list as $item)
            @if (old('report_id', $data->report_id == $item->id))
            <option value="{{ $item->id }}" selected>{{ $item->prj }}</option>
            @else
            <option value="{{ $item->id }}">{{ $item->prj }}</option>
            @endif
        @endforeach
    </select>
    @if($errors->has('report_id'))
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $errors->first('report_id') }}</strong>
            </span>
    @endif
</div>
<div class="mb-3">
    <label for="status_id" class="form-label">STATUS PROJECT</label>
        <select class="form-control form-control-sm" name="status_id" id="status_id">
            <option value="">-- Choose One --</option>
            @foreach ($stats as $item)
                @if(old('status_id', $data->status_id == $item->id))
                    <option value="{{ $item->id }}" selected>{{ $item->stats }}</option>
                @endif
                    <option value="{{ $item->id }}">{{ $item->stats }}</option>
            @endforeach
        </select>
</div>
<button type="submit" class="btn btn-primary">Save</button>
</form>
@endsection