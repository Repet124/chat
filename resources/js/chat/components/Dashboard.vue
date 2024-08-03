<template>
		<Loader v-if="!unferifiedUsers" class="self-center" />
		<ul v-else>
			<li v-for="user in unferifiedUsers" class="flex gap-4 items-center">
				{{ user.name }}
				<button
					class="py-1 px-3 font-bold flex items-center justify-center w-max text-lg bg-blue-400 border-none hover:bg-blue-300"
					@click="verfify(user)"
				>Верифицировать</button>
			</li>
		</ul>
</template>

<script setup>

	import { ref } from 'vue';

	var unferifiedUsers = ref(null);

	axios.get('/api/users?unverified=true')
		.then(response => {
			unferifiedUsers.value = response.data
		});

	function verfify(user) {
		axios.put(`/api/users/${user.id}/verfy`);
	}

	function remove(user) {
		axios.delete(`/api/users/${user.id}`);
	}
</script>

<style scoped>

</style>
