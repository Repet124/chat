<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	@vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/login.js'])
</head>
<body class="bg-slate-900 text-white">
	<h1 class="text-3xl py-6 text-center">Ты у нас?</h1>
	<form
		id="formJS"
		class="container flex flex-col gap-4 items-center"
	>
		<p id="err" class="hidden py-4 px-2 text-lg font-bold bg-red-400">Всё плохо</p>
		<x-input id="username" name="username" placeholder="Юзернеймчик..." />
		<x-input id="password" type="password" name="password" placeholder="Раполь..." />
		<div class="flex justify-around w-full items-center">
			<x-btn>Ага</x-btn>
			<a class="text-slate-400 underline text-lg hover:text-blue-400" href="/join">Присоединиться</a>
		</div>
	</div>
</body>
</html>
