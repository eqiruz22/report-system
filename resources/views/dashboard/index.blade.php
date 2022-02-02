@extends('layouts/template')

@section('content')
    <!-- Page Heading -->
    @auth
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Hello, {{ auth()->user()->name }}</h1>
        @endauth
        <a href="/report-excel" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" target="_blank"><i
                class="fas fa-download fa-sm text-white-50"></i> Generate Report
        </a>
    </div>

    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                ALL REPORT</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ $data }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Earnings (Monthly) Card Example -->
         <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                               PRJ AKTIF</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">-</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> 

        <!-- Earnings (Monthly) Card Example -->
         <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">PRJ FINISH
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">-</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> 

        <!-- Pending Requests Card Example -->
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                               PRJ CANCEL</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">-</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <div class="overflow-table">
      <table class="table table-bordered table-responsive-xl">
          <thead>
              <tr>
                <th scope="col">NAME</th>
                <th scope="col">PRJ</th>
                <th scope="col">PROJECT TITLE</th>
                <th scope="col">PO</th>
                <th scope="col">COSTUMER</th>
                <th scope="col">PROJECT TYPE</th>
                <th scope="col">DATE OF PO</th>
                <th scope="col">DUE DATE</th>
                <th scope="col">PROJECT VALUE</th>
                <th scope="col">REMAINING REIMBUSMENT FEE</th>
                <th scope="col">GROSS MARGIN</th>
                <th scope="col">NET MARGIN</th>
                <th scope="col">IRR</th>
                <th scope="col">EQUIPMENT</th>
                <th scope="col">PMO COST</th>
                <th scope="col">OPEX</th>
                <th scope="col">FILE HO</th>
                <th scope="col">UPDATE AT</th>
              </tr>
            </thead>
            <tbody>
                @foreach ($list as $item)
                <tr>
                    <td>{{ $item->user['name'] }}</td>
                    <td>{{ $item->prj }}</td>
                    <td>{{ $item->project_title }}</td>
                    <td>{{ $item->po_number }}</td>
                    <td>{{ $item->costumer }}</td>
                    <td>{{ $item->project_type }}</td>
                    <td>{{ $item->date_of_po }}</td>
                    <td>{{ $item->due_date }}</td>
                    <td>Rp {{ currency_IDR($item->project_value) }}</td>
                    <td>Rp {{ currency_IDR($item->remaining_reimbusment_fee) }}</td>
                    <td>{{ $item->gross_margin }}</td>
                    <td>{{ $item->net_margin }}</td>
                    <td>{{ $item->irr }}</td>
                    <td>Rp {{ currency_IDR($item->equipment) }}</td>
                    <td>Rp {{ currency_IDR($item->pmo_cost) }}</td>
                    <td>Rp {{ currency_IDR($item->opex) }}</td>
                    <td><a href="/storage/docs-store-ho/{{ $item->file_ho }}">{{ $item->file_ho }}</a></td>
                    <td>{{ $item->updated_at }}</td>
                </tr>
                @endforeach
            </tbody>    
      </table>
    </div>
@endsection