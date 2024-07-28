<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	@vite(['resources/css/app.css', 'resources/js/chat/index.js'])
</head>
<body class="bg-slate-900 ">
	<div id="app" data-user="{{ auth()->user()->id }}"></div>
</body>
</html>
