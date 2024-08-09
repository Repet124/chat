<template>
	<div
		class="flex flex-col gap-4 overflow-y-scroll"
		ref="chat"
	>
		<Loader v-if="!messages" class="self-center" />
		<Message v-else v-for="message in messages" v-bind="message" />
	</div>

	<WritingAlert />
	<Editor />
</template>

<script setup>

	import { ref, inject, watch, onUpdated } from 'vue';

	var messages = ref(null);
	var chat = ref(null);

	var scrollBehavior = 'auto';

	axios.get('/api/messages')
		.then(response => {
			messages.value = response.data.data;
			Echo.private('message')
				.listen('.MessageCreated', e => {
					scrollBehavior = 'smooth';
					messages.value.push(e)
				})
		})

	onUpdated(() => {
		chat.value.scroll({
			top: chat.value.scrollHeight,
			behavior: scrollBehavior
		});
	});

</script>
