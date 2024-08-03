<template>
	<div class="container h-screen flex flex-col gap-4 text-white py-4">
		<Modal ref="modal"/>
		<Header @toggleDashboard="showDashboard = !showDashboard"/>
		<Dashboard v-if="showDashboard" />
		<Chat v-else />
	</div>
</template>

<script setup>

	import { ref, provide, onMounted } from 'vue';
	import Modal from '@/chat/components/Modal.vue';

	var { user } = defineProps(['user']);
	var modal = ref(null);
	var showDashboard = ref(false);

	provide('user', user);
	provide('modalWindow', modal);


</script>
