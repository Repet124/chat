<template>
		<h1 class="text-xl">Пользователи ожидающие верификации</h1>
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

	import { ref, inject } from 'vue';

	var modal = inject('modalWindow');
	var unferifiedUsers = ref(null);

	function setUsers() {
		unferifiedUsers.value = null;
		axios.get('/api/users?unverified=true')
			.then(response => {
				unferifiedUsers.value = response.data
			});
	}

	function verfify(user) {
		modal.value.confirm(`Верифицировать пользователя ${user.name}?`, () => {
			axios.put(`/api/users/${user.id}/verify`)
				.then(setUsers);
		});
	}

	function remove(user) {
		modal.value.confirm(`Удалить пользователя ${user.name}?`, () => {
			axios.delete(`/api/users/${user.id}`)
				.then(setUsers);
		});
	}

	setUsers();
</script>
