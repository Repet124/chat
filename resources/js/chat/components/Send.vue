<template>
	<div class="overflow-hidden">
		<button
			:class="{'translate-x-full': disabled}"
			class="flex justify-center items-center w-16 h-16 bg-blue-400 text-3xl font-bold rounded-full transition"
		>
			&#8927;
		</button>
	</div>

</template>

<script setup>
	defineProps({
		disabled: {type: Boolean}
	})
</script>
