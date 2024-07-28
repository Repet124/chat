<template>
	<div class="container h-screen flex flex-col gap-4 text-white py-4">
		<Modal ref="modal"/>
		<Header />
		<Chat />
		<Editor />

	</div>
</template>

<script setup>

	import { ref, provide } from 'vue';
	import Modal from '@/chat/components/Modal.vue';

	var { userId } = defineProps(['userId']);
	var modal = ref(null);

	provide('userId', Number(userId));
	provide('modalWindow', modal);


</script>
