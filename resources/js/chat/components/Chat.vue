<template>
	<div class="flex flex-col gap-4 flex-grow">
		<Loader v-if="!messages" class="self-center"/>
		<Message
			v-else
			v-for="message in messages"
			:my="myId === message.user_id"
		>{{ message.text }}</Message>
	</div>
</template>

<script setup>

	import { ref, inject } from 'vue';

	var myId = inject('userId');
	var messages = ref(null);

	axios.get('/api/messages')
		.then(response => {
			messages.value = response.data;
			Echo.channel('message').listen('.MessageCreated', e => {
				messages.value.push(e.model)
			})
		})

</script>

<style scoped>

</style>
