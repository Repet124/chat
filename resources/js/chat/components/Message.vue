<template>
	<div
		:class="
			my ? 'bg-blue-400 self-end rounded-bl-3xl' : 'bg-slate-700 rounded-br-3xl'
		"
		class="py-2 px-5 rounded-t-3xl max-w-[80%] w-max"
	>
	<p v-if="!my" class="text-bold text-emerald-500">{{ author }}</p>
	{{ text }}
	</div>
</template>

<script setup>
	defineProps(['text', 'author', 'my']);
</script>
