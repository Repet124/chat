<template>
	<header class="flex justify-between items-center">
		<h1 class="font-bold text-center text-4xl">Chat!</h1>
		<button
			class="py-2 px-4 font-bold flex items-center justify-center w-max text-xl bg-blue-400 border-none hover:bg-blue-300"
			@click="logout()"
		>logout</button>
	</header>
</template>

<script setup>
	function logout() {
		axios.get('/logout')
			.then(() => location = '/')
	}
</script>
