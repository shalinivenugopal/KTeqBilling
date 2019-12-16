@extends('admin.layouts.master') 

@section('Current-Page') 
Income MonthlyWise 
@endsection 

@section('Parent-Menu') 
Income 
@endsection 

@section('Menu') 
Income MonthlyWise 
@endsection 

@section('content')


@php
    $PrevM =  Carbon\Carbon::parse($Year.'-'.$Month)->subMonth()->format('m'); 
    $PrevY =  Carbon\Carbon::parse($Year.'-'.$Month)->subMonth()->format('Y'); 
    $NextM =  Carbon\Carbon::parse($Year.'-'.$Month)->addMonthsNoOverflow(1)->format('m'); 
    $NextY =  Carbon\Carbon::parse($Year.'-'.$Month)->addMonthsNoOverflow(1)->format('Y'); 
@endphp

	<div class="tile">
		<div class="tile">
			<div class="row">
				<div class="col-lg-12">
					<a href="{{ route('admin.GetMonthlyIncome',[$PrevM,$PrevY]) }}"><button type="button"  class="btn btn-info">&laquo; Previous</button></a>
					<a href="{{ route('admin.GetMonthlyIncome',[$NextM,$NextY]) }}"><button class="btn btn-info pull-right">Next &raquo;</button></a>
				</div>
			</div>
		</div>

		@php
	        $DashboardIncomeDetails = DashboardIncomeDetails($Month,$Year);
	    @endphp

		<div class="tile">
			<div class="row">
				<div class="col-lg-12">
					<h4>&nbsp;&nbsp;Income</h4>
				</div>
			</div>
			<div class="row">
				<div class="card-body table-responsive" id="printdiv">
					<table class="table table-hover table-bordered" id="reporttable">
						<thead>
							<tr>
								<th class="csvth">S.no</th>
								<th class="csvth">Date</th>
								<th class="csvth">Bill No</th>
								<th class="csvth">Customer Name</th>
								<th class="csvth">Total Cost</th>
								<th class="csvth">Balance</th>
							</tr>
						</thead>
						<tbody  id="tablebody">
							@foreach($DashboardIncomeDetails['Income'] as $key=>$Income)
								<tr>
									<td>{{ ++$key }}</td>
									<td>{{ date('d-m-Y',strtotime($Income->date)) }}</td>
									<td>{{ $Income->bill_number }}</td>
									<td>{{ $Income->Client->name }}</td>
	                                <td>{{ $Income->bill_amount }}</td>
	                                <td>{{ $Income->balance_amount }}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>

		<div class="tile">
			<div class="row">
				<div class="col-lg-12">
					<h4>&nbsp;&nbsp;Expense</h4>
				</div>
			</div>
			<div class="row">
				<div class="card-body table-responsive" id="printdiv">
					<table class="table table-hover table-bordered" id="reporttable">
						<thead>
							<tr>
								<th class="csvth">S.no</th>
								<th class="csvth">Date</th>
								<th class="csvth">Expense</th>
								<th class="csvth">Amount</th>
								<th class="csvth">Description</th>
							</tr>
						</thead>
						<tbody  id="tablebody">
							@foreach($DashboardIncomeDetails['Expense'] as $key=>$Expense)
								<tr>
									<td>{{ ++$key }}</td>
									<td>{{ date('d-m-Y',strtotime($Expense->date)) }}</td>
									<td>{{ @$Expense->EmployeeName ? $Expense->ExpenseCategory->expense_type.'-'.@$Expense->EmployeeName->name :$Expense->ExpenseCategory->expense_type }}</td>
									<td>{{ $Expense->amount }}</td>
									<td>{{ $Expense->description }}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
								
@endsection

@section('loadMore')

<style>
.button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}

.button2 {background-color: #008CBA;} /* Blue */
.button3 {background-color: #f44336;} /* Red */ 
.button4 {background-color: #e7e7e7; color: black;} /* Gray */ 
.button5 {background-color: #555555;} /* Black */
</style>
@endsection
