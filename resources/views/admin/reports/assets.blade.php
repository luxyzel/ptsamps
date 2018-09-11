<span><strong><center>AVAILABLE ASSET SUMMARY </center></strong></span>
<br><br>
<span>Date: {{ date('M. d, Y') }}</span>
<br><br>

<table style="width: 100%; text-align: center;">
	<thead>
		<tr>
			<th>Category Type</th>
			<th>No. of Available Asset</th>
		</tr>
	</thead>
		@foreach ($AssetReports as $AssetReport)
			<tr>
				<td>{{$AssetReport->category_type}}</td>
				<td>{{$AssetReport->count}}</td>
			</tr>
		@endforeach
</table>