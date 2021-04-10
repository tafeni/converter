@extends('customer.layouts.master')

@section('customer')

    <div class="content-header row">
        <div class="content-header-left col-md-6 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="breadcrumb-wrapper col-12">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route('home')}}">Home</a>
                        </li>
                        <li class="breadcrumb-item active text-uppercase">Conversion History
                        </li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body mt-3">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Conversion History</h4>
                    </div>

                    <div class="card-content collapse show">
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                        <tr>
                            <th>#</th>
                            <th>Old Code</th>
                            <th>New Code</th>
                            <th>From </th>
                            <th>To</th>
                            <th>State</th>
                            <th>Amount</th>
                            <th>Date</th>
                        </tr>
                        </thead>
                        <tbody>
                        @forelse($convs as $key=>$list)
                            <tr>
                                <th scope="row">{{ $key + $convs->firstItem() }}</th>
                                <td>{{$list->code_old}}</td>
                                <td>{{$list->code_new}}</td>
                                <td>{{$list->code_from}}</td>
                                <td>{{$list->code_to}}</td>
                                <td class="text-capitalize">{{$list->state}}</td>
                                <td style="margin-left: 20px">{{money_format($list->amount,2)}}</td>
                                <td>{{$list->getFormattedDateAttribute()}}</td>
                            </tr>
                        @empty
                            <tr><td class="text-danger font-large-1 text-center text-capitalize" colspan="6">No record exist at the moment</td></tr>
                        @endforelse
                    </table>
                    {{ $convs->links() }}
                </div>
            </div>
        </div>
                </div>
            </div>
        </div>
    </div>
@endsection
