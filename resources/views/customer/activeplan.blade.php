<div class="card">
    <div class="card-header">
        <h4 class="card-title"><i class="feather icon-credit-card"></i> Purchase Detail</h4>
    </div>
    <div class="card-body">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Cost</th>
                            <th>Credits</th>
                            <th>Duration (Days)</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td class="text-uppercase"> {{$bundle->name}}</td>
                            <td> &#8358;{{number_format($bundle->cost)}}</td>
                            <td> {{$bundle->value}}</td>
                            <td> {{$bundle->duration}}</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
                <div class="payment_method">

                    <div class="order_button">
                        <a href="#" style="border: none" class="btn-block btn-green text-centeroooo">Activate Plan</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
