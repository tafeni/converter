@extends('customer.layouts.master')

@section('customer')
    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a>
                        </li>
                        <li class="breadcrumb-item active text-uppercase">Payment Response
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body mt-5">
        <div class="row grouped-multiple-statistics-card">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        @if($status ==="success")
                            <h4 class="text-center text-success">Congratulations payment was successful</h4>
                        @else
                            <h4 class="text-center text-danger">Sorry payment was unsuccessful</h4>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
