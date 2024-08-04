<template>
	<div
		class="fixed flex justify-center items-center p-8 top-0 left-0 w-screen h-screen bg-slate-900/70"
		:class="!message ? 'hidden' : ''"
	>
		<div class="flex flex-col gap-4 p-4 rounded-xl bg-slate-600">
			<p class="font-bold text-center">{{ message }}</p>
			<div class="flex justify-around">
				<Btn
					v-if="action"
					@click="doAction()"
					bg="bg-emerald-500 hover:bg-emerald-300"
				>
					Confirm
				</Btn>
				<Btn @click="close()">Close</Btn>
			</div>
		</div>
	</div>
</template>

<script setup>
	import { ref } from 'vue';

	var message = ref('');
	var action = ref(null);

	function show(text, fn) {
		message.value = text;
		if (fn) {
			action.value = fn;
		}
	}

	function doAction() {
		action.value();
		close();
	}

	function close() {
		message.value = '';
		action.value = null;
	}

	defineExpose({
		show,
		confirm: show
	});
</script>

<style scoped>

</style>
