<html>
<head></head>
<body style="background: black; color: white">
<p> {{ $title }} </p>
<p> {{ number_format($price, 2) }} </p>
<hr />
<p>Total Visit: {{ $totalVisit }}</p>
<p>Total Document Downloaded: {{ $totalDownload }}</p>
</body>
</html>