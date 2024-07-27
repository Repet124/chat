<template>
	<textarea
		class="flex-grow py-2 px-4 bg-transparent border border-1 border-slate-400 rounded-3xl text-base resize-none outline-none"
		:rows="rows"
		v-model="message"
		ref="tarea"
	>{{ message }}</textarea>
	{{qwe()}}
</template>

<script setup>
	import { ref, computed } from 'vue';

	var maxRowsCount = 6;
	var message = ref('');
	var rows = computed(() => {
		var rowsCount = message.value.match(/\n/g)?.length+1 || 1;
		return rowsCount <= maxRowsCount
			? rowsCount
			: maxRowsCount;
	})
	function qwe() {
		console.log(rows.value)
	}
</script>

<style scoped>
	
</style>
