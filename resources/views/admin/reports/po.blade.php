<span><strong><center>APPROVED  PURCHASE ORDER SUMMARY </center></strong></span>
<br><br>
<span>Date: {{ date('M. d, Y') }}</span>
<br><br>

<table style="width: 100%; text-align: center;">
	<thead>
		<tr>
			<th>PO Number</th>
			<th>Date Requested</th>
			<th>Requested by</th>
			<th>Date Approved</th>
			<th>Approved by</th>
			{{-- <th>Total Cost</th> --}}
		</tr>
	</thead>
		@foreach ($POReports as $POReport)
			<tr>
				<td>{{$POReport->ponumbers->po_number}}</td>
				<td>{{  Carbon\Carbon::parse($POReport->request_date)->format('M. d, Y') }}</td>
				<td>{{$POReport->requestors->requestor_name}}</td>
				<td>{{ Carbon\Carbon::parse($POReport->date)->format('M. d, Y') }}</td>
				<td>{{$POReport->approvers->name}}</td>
				{{-- <td>{{$POReport->request_date}}</td> --}}
			</tr>
		@endforeach
</table>