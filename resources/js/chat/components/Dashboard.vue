<template>
		<h1 class="text-xl">Пользователи ожидающие верификации</h1>
		<Loader v-if="!unferifiedUsers" class="self-center" />
		<ul v-else>
			<li v-for="user in unferifiedUsers" :key="user.id" class="flex gap-4 items-center">
				{{ user.name }}
				<Btn @click="verfify(user)" class="py-0 !px-2">
					<LikeIcon class="w-12 h-12 stroke-white" />
				</Btn>
				<button class="block h-full px-2 bg-red-500 hover:bg-red-400" @click="remove(user)">
					<DeleteIcon class="w-12 h-12 stroke-white" />
				</button>
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
