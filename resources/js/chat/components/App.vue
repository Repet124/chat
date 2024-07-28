<template>
	<div class="container min-h-screen flex flex-col gap-4 text-white py-4">
		<Header />
		<Chat />
		<Editor />
	</div>
</template>

<script setup>

	import { provide } from 'vue';

	var currentUser = {
		id: 3,
		name: 'test'
	}
	provide(currentUser);

</script>
