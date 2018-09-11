<span><strong><center>PENDING PURCHASE ORDER REQUEST SUMMARY </center></strong></span>
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
		</tr>
	</thead>
		@foreach ($PendingPOReports as $pendingPO)
			<tr>
				<td>{{$pendingPO->item}}</td>
				<td>{{  Carbon\Carbon::parse($pendingPO->request_date)->format('M. d, Y') }}</td>
				<td>{{$pendingPO->requestors->requestor_name}}</td>
			</tr>
		@endforeach
</table>