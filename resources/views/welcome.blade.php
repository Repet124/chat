<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	 @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/login.js'])
</head>
<body class="bg-slate-900 text-white">
	<h1 class="text-3xl py-6 text-center">Login</h1>
	<form
		id="formJS"
		class="container flex flex-col gap-4 items-center"
	>
		<p id="err" class="hidden py-4 px-2 text-lg font-bold bg-red-400">Всё плохо</p>
		<input id="name" type="text" name="name" class="px-4 outline-none h-10 w-full bg-transparent border border-slate-500 text-lg" placeholder="name">
		<input id="password" type="password" name="password" class="px-4 outline-none h-10 w-full bg-transparent border border-slate-500 text-lg" placeholder="password">
		<button id="btn" class="py-2 px-4 font-bold flex items-center justify-center w-max text-3xl bg-blue-400 border-none hover:bg-blue-300">Login</button>
	</div>
</body>
</html>
