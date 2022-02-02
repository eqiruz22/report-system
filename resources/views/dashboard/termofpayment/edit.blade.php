@extends('layouts/template')

@section('content')
    <form action="/term-of-payment/update/{{ $data->id }}" method="POST" id="create_form">
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
            <label for="tanggal_invoice" class="form-label">TANGGAL INVOICE</label>
            <input type="date" class="form-control form-control-sm @error('tanggal_invoice') is-invalid @enderror" id="rupiah4" name="tanggal_invoice" value="{{ old('tanggal_invoice', $data->tanggal_invoice) }}">
            @error('tanggal_invoice')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="remarks_finance" class="form-label">REMARKS FINANCE</label>
            <input type="text" class="form-control form-control-sm @error('remarks_finance') is-invalid @enderror" id="remarks_finance" name="remarks_finance" value="{{ old('remarks_finance', $data->remarks_finance) }}">
            @error('remarks_finance')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
@endsection