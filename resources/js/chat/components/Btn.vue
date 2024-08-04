<template>
	<button
		class="py-2 px-4 font-bold flex items-center justify-center w-max text-xl border-none"
		:class="[
			bg || 'bg-blue-400 hover:bg-blue-300',
			color || 'text-white'
		]"
	>
		<slot />
	</button>
</template>

<script setup>
	defineProps(['bg', 'color'])
</script>
