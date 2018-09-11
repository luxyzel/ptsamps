<span><strong><center>REJECTED  PURCHASE ORDER REQUEST SUMMARY </center></strong></span>
<br><br>
<span>Date: {{ date('M. d, Y') }}</span>
<br><br>

<head>
   <style>
   table {border-collapse:collapse; table-layout:fixed; width:310px;}
   table td {border:solid 1px #fab; width:100px; word-wrap:break-word;}
   </style>
</head>

<table style="width: 100%; text-align: center;">
	<thead>
		<tr>
			<th>Items</th>
			<th>Date Requested</th>
			<th>Requested by</th>
			<th>Date Rejected</th>
			<th>Rejected by</th>
			{{-- <th>Total Cost</th> --}}
		</tr>
	</thead>
		@foreach ($RejectedPOReports as $rejectedPO)
			<tr>
				<td>{{$rejectedPO->item}}</td>
				<td>{{  Carbon\Carbon::parse($rejectedPO->request_date)->format('M. d, Y') }}</td>
				<td>{{$rejectedPO->requestors->requestor_name}}</td>
				<td>{{ Carbon\Carbon::parse($rejectedPO->date)->format('M. d, Y') }}</td>
				<td>{{$rejectedPO->approvers->name}}</td>
				{{-- <td>{{$POReport->request_date}}</td> --}}
			</tr>
		@endforeach
</table>