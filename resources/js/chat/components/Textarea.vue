<template>
	<textarea
		class="flex-grow py-2 px-4 bg-transparent border border-1 border-slate-400 rounded-3xl text-base resize-none outline-none"
		:rows="rows"
		v-model="model"
		ref="tarea"
	>{{ model }}</textarea>
</template>

<script setup>
	import { ref, computed } from 'vue';

	var model = defineModel();

	var maxRowsCount = 6;

	var rows = computed(() => {
		var rowsCount = model.value.match(/\n/g)?.length+1 || 1;
		return rowsCount <= maxRowsCount
			? rowsCount
			: maxRowsCount;
	});
</script>

<style scoped>
	
</style>
