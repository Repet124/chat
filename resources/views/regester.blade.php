<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	@vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/regester.js'])
</head>
<body class="bg-slate-900 text-white h-screen">
	<h1 class="text-3xl py-6 text-center">Становление нашим</h1>
	<form
		id="formJS"
		class="container flex flex-col gap-4 items-center"
	>
		<p id="err" class="hidden py-4 px-2 text-lg font-bold bg-red-400">Всё плохо</p>
		<x-input id="username" type="text" name="username" placeholder="Юзернеймчик..." />
		<x-input id="name" type="text" name="name" placeholder="Имячко..." />
		<x-input id="password" type="password" name="password" placeholder="Раполь..." />
		<x-btn>Интегрироваться...</x-btn>
	</div>
</body>
</html>
