@extends('customer.layouts.master')

@section('customer')

    <div class="content-header row">
    </div>
    <div class="content-body">
        <!-- users view start -->
        <section class="users-view">
            <!-- users view media object start -->
            <div class="row">
                <div class="col-12 col-sm-7">
                    <div class="media mb-2">
                        <a class="mr-1" href="#">
                            <img src="{{asset(($user->avatar) ? $user->avatar :'admin/images/avatar1.png')}}" alt="users view avatar" class="users-avatar-shadow rounded-circle" height="64" width="64">
                        </a>
                        <div class="media-body pt-25">
                            <h4 class="media-heading"><span class="users-view-name">{{$user->name}} </span>
{{--                                <span class="text-muted font-medium-1"> @</span>--}}
{{--                                <span class="users-view-username text-muted font-medium-1 ">candy007</span>--}}
                            </h4>
{{--                            <span>ID:</span>--}}
{{--                            <span class="users-view-id">305</span>--}}
                        </div>
                    </div>
                </div>
                <div class="col-12 col-sm-5 px-0 d-flex justify-content-end align-items-center px-1 mb-2">
                    <a href="#" class="btn btn-sm mr-25 border"><i class="feather icon-message-square font-small-3"></i></a>
                    <a href="" class="btn btn-sm btn-primary">Edit</a>
                </div>
            </div>
            <!-- users view media object ends -->
            <!-- users view card data start -->
            <div class="card">
                <div class="card-content">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-md-3">
                                <table class="table table-borderless">
                                    <tbody>
                                    <tr>
                                        <td>Registered:</td>
                                        <td>{{$user->getFormattedDateAttribute()}}</td>
                                    </tr>
{{--                                    <tr>--}}
{{--                                        <td>Latest Activity:</td>--}}
{{--                                        <td class="users-view-latest-activity">30/04/2019</td>--}}
{{--                                    </tr>--}}
                                    <tr>
                                        <td>Verified:</td>
                                        <td class="users-view-verified">Yes</td>
                                    </tr>

                                    <tr>
                                        <td>Status:</td>
                                        <td><span class="badge badge-success users-view-status">{{($user->status) ? "Active" : "Disabled"}}</span></td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="col-12 col-md-9">
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <h4>Most Recent Conversions</h4>
                                        <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Old Code</th>
                                            <th>New Code</th>
                                            <th>From</th>
                                            <th>To</th>
                                            <th>State</th>
                                            <th>Date</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <?php $count = 0?>
                                        @forelse($convert as $list)
                                        <tr>
                                            <td>{{++$count}}</td>
                                            <td>{{$list->code_old}}</td>
                                            <td>{{$list->code_new}}</td>
                                            <td>{{$list->code_from}}</td>
                                            <td>{{$list->code_to}}</td>
                                            <td class="text-capitalize">{{$list->state}}</td>
                                            <td>{{$list->getFormattedDateAttribute()}}</td>

                                        </tr>
                                        @empty
                                            <tr><td class="text-danger font-large-1 text-center text-capitalize" colspan="7">No record exist at the moment</td></tr>
                                        @endforelse

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>

@endsection
