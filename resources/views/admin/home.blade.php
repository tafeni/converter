@extends('admin.layout.master')

@section('admin')

    <div class="content-header row">
    </div>
    <div class="content-body">
        <div class="row grouped-multiple-statistics-card">
            <div class=" offset-3 col-md-6 col-sm-12">
                <div class="card">
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <div class="card-text">
                                <div id="check">

                                </div>
                            </div>
                            <form id="convertfrm" class="form" action="{{route('admin.treading.code.post')}}" method="POST">
                                @csrf
                                @if ($message = Session::get('success'))

                                    <div class="alert alert-success alert-block">

                                        <button type="button" class="close" data-dismiss="alert">×</button>

                                        <strong>{{ $message }}</strong>

                                    </div>
                                @endif
                                @if (count($errors) > 0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <div class="form-body">
                                    <h4 class="form-section">
                                        <i class="feather icon-user"></i> Enter Trending Codes
                                    </h4>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="code">Influencer</label>
                                                <input type="text" id="influencer" class="form-control" value="{{old('influencer')}}" placeholder="Enter Influence" name="influencer" required>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="code">Code</label>
                                                <input type="text" id="code" class="form-control" value="{{old('code')}}" placeholder="Enter Code" name="code">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="code">Odd</label>
                                                <input type="text" id="odd" class="form-control" placeholder="Enter Odd" name="odd" required value="{{old('odd')}}">
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="code">Book Maker</label>
                                                <input type="text" id="booky" class="form-control" value="{{old('booky')}}" placeholder="Enter Book Maker" name="booky" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group">
                                                <label for="code">What Date</label>
                                                <input type="date" id="day" class="form-control" value="{{old('day')}}" placeholder="Enter Date" name="day" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-6 offset-5">
                                            <button type="submit" id="convertbtn" class="btn btn-black">Trending Code</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
