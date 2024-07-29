<template>
	<div class="flex flex-col flex-grow gap-2">
		<textarea
			class="py-2 px-4 bg-transparent border border-1 border-slate-400 rounded-3xl text-base resize-none outline-none"
			:rows="rows"
			@input="validate($event.target.value)"
			v-model="model"
			ref="tarea"
		></textarea>
		<span class="text-slate-500 self-end">
			{{ model.length + ' / ' + maxStrLength}}
		</span>
	</div>
</template>

<script setup>
	import { ref, computed, inject } from 'vue';

	var maxRowsCount = 6;
	var maxStrLength = 255;

	var modalWindow = inject('modalWindow');
	var model = defineModel();
	var tarea = ref(null);

	var rows = computed(() => {
		var rowsCount = model.value.match(/\n/g)?.length+1 || 1;
		return rowsCount <= maxRowsCount
			? rowsCount
			: maxRowsCount;
	});

	function validate(text) {
		if (text.length > maxStrLength) {
			modalWindow.value.show('Слишкаммногабукаф');
			tarea.value.blur();
			model.value = model.value.slice(0,-1);
			return;
		}
		model.value = text;
	}
</script>

<style scoped>
	
</style>
