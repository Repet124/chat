<template>
	<div
		class="flex flex-col gap-4 overflow-scroll"
		ref="chat"
	>
		<Loader v-if="!messages" class="self-center"/>
		<Message
			v-else
			v-for="message in messages"
			:my="myId === message.user_id"
		>{{ message.text }}</Message>
	</div>
</template>

<script setup>

	import { ref, inject, watch, onUpdated } from 'vue';

	var myId = inject('userId');
	var messages = ref(null);
	var chat = ref(null);
	var scrollBehavior = 'auto';

	axios.get('/api/messages')
		.then(response => {
			messages.value = response.data;
			Echo.channel('message').listen('.MessageCreated', e => {
				scrollBehavior = 'smooth';
				messages.value.push(e.model)
			})
		})

	onUpdated(() => {
		chat.value.scroll({
			top: chat.value.scrollHeight,
			behavior: scrollBehavior
		});
	});

</script>
