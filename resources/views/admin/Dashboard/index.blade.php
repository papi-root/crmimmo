@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-xxl-3 col-lg-6">
        <div class="card widget-flat bg-success text-white">
            <div class="card-body">
                <div class="float-end">
                    <i class="mdi mdi-account-multiple widget-icon bg-white text-success"></i>
                </div>
                <h6 class="text-uppercase mt-0" title="Customers">Clients</h6>
                <h3 class="mt-3 mb-3">36,254</h3>
                <p class="mb-0">
                    <span class="badge badge-light-lighten me-1">
                        <i class="mdi mdi-arrow-up-bold"></i> 5.27%</span>
                    <span class="text-nowrap">Since last month</span>
                </p>
            </div>
        </div>
    </div> <!-- end col-->

    <div class="col-xxl-3 col-lg-6">
        <div class="card widget-flat bg-primary text-white">
            <div class="card-body">
                <div class="float-end">
                    <i class="mdi mdi-account-multiple widget-icon bg-white text-primary"></i>
                </div>
                <h6 class="text-uppercase mt-0" title="Customers">Logements Disponible</h6>
                <h3 class="mt-3 mb-3">36,254</h3>
                <p class="mb-0">
                    <span class="badge badge-light-lighten me-1">
                        <i class="mdi mdi-arrow-up-bold"></i> 5.27%</span>
                    <span class="text-nowrap">Since last month</span>
                </p>
            </div>
        </div>
    </div> <!-- end col-->
    
    <div class="col-xxl-3 col-lg-6">
        <div class="card widget-flat bg-warning text-white">
            <div class="card-body">
                <div class="float-end">
                    <i class="mdi mdi-account-multiple widget-icon bg-white text-warning"></i>
                </div>
                <h6 class="text-uppercase mt-0" title="Customers">Contrat en cours</h6>
                <h3 class="mt-3 mb-3">36,254</h3>
                <p class="mb-0">
                    <span class="badge badge-light-lighten me-1">
                        <i class="mdi mdi-arrow-up-bold"></i> 5.27%</span>
                    <span class="text-nowrap">Since last month</span>
                </p>
            </div>
        </div>
    </div> <!-- end col-->
    
    <div class="col-xxl-3 col-lg-6">
        <div class="card widget-flat bg-danger text-white">
            <div class="card-body">
                <div class="float-end">
                    <i class="mdi mdi-account-multiple widget-icon bg-white text-danger"></i>
                </div>
                <h6 class="text-uppercase mt-0" title="Customers">Contrat expiré</h6>
                <h3 class="mt-3 mb-3">36,254</h3>
                <p class="mb-0">
                    <span class="badge badge-light-lighten me-1">
                        <i class="mdi mdi-arrow-up-bold"></i> 5.27%</span>
                    <span class="text-nowrap">Since last month</span>
                </p>
            </div>
        </div>
    </div> <!-- end col-->
    
</div> 
@endsection