<template>
	<div class="flex gap-4 items-center">
		<Textarea
			v-model="message";
		/>
		<Send @click="send()" />
	</div>
</template>

<script setup>
	var message = ref('');

	function send() {
		axios.post('/api/messages', {
			text: message.value
		})
			.then(() => message.value = '')
	}
</script>

<style scoped>

</style>
