<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Coupon</title>
</head>
<body>
	<head>Coupon</head>
	<table class="table" style="border: 1px solid black;
	border-radius: $borderRadius;
	box-shadow: 3px 3px 0 rgba(0,0,0,0.1);
	max-width: calc(100% - 2em);
	margin: 1em auto;
	overflow: hidden;
	width: 800px;">
	<thead>
		<th style="padding: 10px;">Name</th>
		<th style="padding: 10px;">address</th>
		<th style="padding: 10px;">Phone</th>
		<th style="padding: 10px;">Email</th>
		<th style="padding: 10px;">Saled</th>
		<th style="padding: 10px;">District</th>
		<th style="padding: 10px;">Prodvince</th>
	</thead>
	<tbody>
		<tr>
			<td style="text-align: center;
			vertical-align: middle;"><?=$product['fullname']?></td>
			<td style="text-align: center;
			vertical-align: middle;"><?=$product['address']?></td>
			<td style="text-align: center;
			vertical-align: middle;"><?=$product['phone']?></td>
			<td style="text-align: center;
			vertical-align: middle;"><?=$product['email']?></td>
			<td style="text-align: center;
			vertical-align: middle;"><?=$product['saled']?></td>
			<td style="text-align: center;
			vertical-align: middle;"><?=$product['district']?></td>
			<td style="text-align: center;
			vertical-align: middle;"><?=$product['province']?></td>
		</tr>
	</tbody>
</table>
</body>
</html>