@extends('layouts/template')

@section('content')
    <form action="/term-of-payment/store" method="POST" id="create_form">
        @csrf
        @auth
            <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
        @endauth
        <div class="mb-3">
            <label for="report_id" class="form-label">PRJ</label>
            <select class="form-control form-control-sm @error('report_id') is-invalid @enderror" id="report_id" name="report_id" value="{{ old('report_id') }}">
                <option value="">-- Choose one --</option>
                @foreach ($data as $item)
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
            <label for="tanggal_invoice" class="form-label">TANGGAL INVOICE</label>
            <input type="date" class="form-control form-control-sm @error('tanggal_invoice') is-invalid @enderror" id="tanggal_invoice" name="tanggal_invoice" value="{{ old('tanggal_invoice') }}">
            @error('tanggal_invoice')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="remarks_finance" class="form-label">REMARKS FINANCE</label>
            <textarea cols="30" rows="10" class="form-control form-control-sm @error('remarks_finance') is-invalid @enderror" id="remarks_finance" name="remarks_finance" value="{{ old('remarks_finance') }}"></textarea>
            @error('remarks_finance')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary mb-3">Create</button>
    </form>
@endsection