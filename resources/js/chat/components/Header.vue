<template>
	<header class="flex justify-between items-center">
		<div class="flex gap-4 items-center">
			<button
				:class="{hidden: !user.is_admin}"
				class="text-3xl"
				@click="$emit('toggleDashboard')"
			>
				<DashboardIcon class="w-12 h-12 stroke-white" />
			</button>
			<h1 class="font-bold text-4xl">Chat!</h1>
		</div>
		<button
			class="py-2 px-4 font-bold flex items-center justify-center w-max text-xl bg-blue-400 border-none hover:bg-blue-300"
			@click="logout()"
		>logout</button>
	</header>
</template>

<script setup>

	import { inject } from 'vue';
	defineEmits(['toggleDashboard']);

	var user = inject('user');

	function logout() {
		axios.get('/logout')
			.then(() => location = '/')
	}
</script>
