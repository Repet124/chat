<template>
	<div
		class="fixed flex justify-center items-center p-8 top-0 left-0 w-screen h-screen bg-slate-900/70"
		:class="!message ? 'hidden' : ''"
	>
		<div class="flex flex-col gap-4 p-4 rounded-xl bg-slate-600 items-center">
			<p
				class="font-bold text-center"
			>{{ message }}</p>
			<button
				class="py-2 px-4 font-bold flex items-center justify-center w-max text-xl bg-blue-400 border-none hover:bg-blue-300"
				@click="close()"
			>Close</button>
		</div>
	</div>
</template>

<script setup>
	import { ref } from 'vue';

	var message = ref('');

	function show(text) {
		message.value = text;
	}

	function close() {
		message.value = '';
	}

	defineExpose({show})
</script>

<style scoped>

</style>
