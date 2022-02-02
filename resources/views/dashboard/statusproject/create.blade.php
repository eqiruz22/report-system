@extends('layouts/template')

@section('content')
    <form action="/status-project/store" method="POST">
        @csrf
        @auth
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
        @endauth
        <div class="mb-3">
            <label for="report_id" class="form-label">PRJ</label>
            <select class="form-control form-control-sm @error('report_id') is-invalid @enderror" id="report_id" name="report_id" value="{{ old('report_id') }}">
                <option value="" selected>-- Choose one --</option>
                @foreach($report as $item)
                <option value="{{ $item->id }}">{{ $item->prj }}</option>
                @endforeach
            </select>
            @if($errors->has('report_id'))
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $errors->first('report_id') }}</strong>
            </span>
            @endif
        </div>
        <div class="mb-3">
            <label for="aktif" class="form-label">STATUS PROJECT</label>
            <select class="form-control form-control-sm @error('status_id') is-invalid @enderror" name="status_id">
                <option value="" selected>-- Choose one --</option>
                @foreach ($stats as $item)
                <option value="{{ $item->id }}">{{ $item->stats}}</option>
                @endforeach
            </select>
            @if ($errors->has('status'))
            <span class="invalid-feedback d-block" role="alert">
                <strong>{{ $errors->first('status') }}</strong>
            </span>
            @endif
        </div>
        <button type="submit" class="btn btn-primary">Create</button>
    </form>
    @endsection