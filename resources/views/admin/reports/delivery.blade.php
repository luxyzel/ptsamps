<span><strong><center>ASSET INCOMING DELIVERY SUMMARY </center></strong></span>
<br><br>
<span>Date: {{ date('M. d, Y') }}</span>
<br><br>

<span>Month of <strong>{{ date('F') }}</strong></span><br>
<table style="width: 100%; text-align: center;">
	<thead>
		<tr>
			<th>Title</th>
			<th>Estimated Date of Delivery</th>
		</tr>
	</thead>
		@foreach ($DeliveryReports as $DeliveryReport)
			<tr>
				<td>{{$DeliveryReport->title}}</td>
				<td>{{ Carbon\Carbon::parse($DeliveryReport->start_date)->format('M. d, Y') }}<span> - </span>{{ Carbon\Carbon::parse($DeliveryReport->end_date)->format('M. d, Y') }}</td>
			</tr>
		@endforeach
</table>