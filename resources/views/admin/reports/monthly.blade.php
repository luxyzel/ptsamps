<span><strong><center>MONTHLY COST REPORT</center></strong></span>
<br><br>
<span>Date: {{ date('M. d, Y') }}</span>
<br><br>


<span>Month of <strong>{{ $totalCost->months }}</strong></span>

<table style="width: 100%; text-align: center;">
	<thead>
		<tr>
			<th>PO NUMBER</th>
			<th>TOTAL PRICE</th>
		</tr>
	</thead>
		@foreach ($MonthlyReports as $MonthlyReport)
			<tr>
				<td>{{$MonthlyReport->pos->po_number}}</td>
				<td>{{ number_format($MonthlyReport->total_price, 2)}}</td>
			</tr>
		@endforeach
</table>

<hr><br>
    
<span>TOTAL COST: <strong>{{ number_format($totalCost->total, 2) }}</strong></span>