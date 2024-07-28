<template>
	<div class="flex flex-col gap-4 flex-grow">
		<Message
			v-for="message in messages"
		>{{ message.text }}</Message>
	</div>
</template>

<script setup>

	import { reactive } from 'vue';
	var messages = reactive([]);

	Echo.channel('message')
		.listen('.MessageCreated', e => {
			console.log(e)
			messages.value.push(e.model)
		})

</script>

<style scoped>

</style>
