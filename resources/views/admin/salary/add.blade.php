@extends('admin.layouts.master')

@section('Current-Page')
Attendence Register
@endsection

@section('Parent-Menu')
Stock
@endsection

@section('Menu')
Attendence Register
@endsection

@section('content')


<div class="tile">
    <div class="row">
        <div class="col-lg-12">
            <button class="btn btn-primary pull-right" type="button" onclick="window.location.href='{{ action('BillingController\SalaryController@index') }}'">View Atttendence
            </button>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-lg-12">
                    <form action="{{ action('BillingController\SalaryController@store') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        <div class="row">
                            <div class="col-lg-4">
                                <div class="form-group"><h5><b>Employee Name</b></h5>
                                   <select class="form-control form-control-lg" name="name" required="">
                                      <option value="">Select Employee Name</option>
                                      @foreach($Employees as $Employee)
                                        <option value={{ $Employee->id }}>{{ $Employee->name}} </option>
                                      @endforeach 
                                   </select>
                                </div>
                             </div>
                            <div class="col-lg-4">
                                <div class="form-group"><h5><b>From Date</b></h5>
                                    <input type="date"  class="form-control" value="{{ old('from_date') }}" name="from_date">
                                </div>
                            </div>
                            <div class='col-sm-4'>
                                 <div class="form-group"><h5><b>Salary Per/DAy</b></h5>
                                <input type='number' class="form-control" placeholder="Enter Salary Per/Day" value="{{ old('amount_per_day') }}" name="amount_per_day"/>
                            </div>
                            </div>
                         	
                        </div>							   
                        
					    <div class="row">

                             <div class="col-lg-4">
                                <div class="form-group"><h5><b>To Date</b></h5>
                                    <input type="date"  class="form-control" value="{{ old('to_date') }}" name="to_date">
                                </div>
                            </div>

					       
					    </div>

                        <div class="row">
                            <div class="col-lg-7">
                                <button class="btn btn-primary pull-right" type="submit">Add Attendence</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection


@section('loadMore')
	
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datetimepicker/4.17.47/css/bootstrap-datetimepicker.min.css" />

    <script type="text/javascript">
        $(function () {
            $('#datetimepicker4').datetimepicker();
        });
    </script>
@endsection