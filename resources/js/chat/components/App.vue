<template>
	<div class="container h-screen flex flex-col gap-4 text-white py-4">
		<Header />
		<Chat />
		<Editor />
	</div>
</template>

<script setup>

	import { provide } from 'vue';

	var { userId } = defineProps(['userId']);
	provide('userId', Number(userId));

</script>
