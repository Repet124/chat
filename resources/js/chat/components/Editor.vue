<template>
	<div class="flex gap-4 items-center">
		<Textarea
			v-model="message"
		/>
		<Send
			:disabled="!message"
			@click="message && send()"
		/>
	</div>
</template>

<script setup>

	import { ref, inject } from 'vue';

	var user = inject('user');
	var message = ref('');
	var lastTyping = 0;
	var timeoutBetweenTypingAlerts = 2000;

	function send() {
		axios.post('/api/messages', {text: message.value})
			.then(() => message.value = '')
	}

	watch(message, (newVal) => {
		var now = Date.now();
		if (now - lastTyping < timeoutBetweenTypingAlerts) {return}

		lastTyping = now;
		Echo.channel('message').whisper('typing', {name: user.name});
	});
</script>

<style scoped>

</style>
