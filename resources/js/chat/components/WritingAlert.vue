<template>
	<p v-if="typingUsers.size" class="text-slate-600">{{usersToPrint}}</p>
</template>

<script setup>
	import { ref, computed, watch } from 'vue';

	var typingUsers = ref(new Map());
	var timeoutUpdating = 4000;
	var intervalUpdatingId = 0;
	var maxUsersToPrint = 3;

	var usersToPrint = computed(() => {
		var list = Array.from(typingUsers.value.keys());
		if (list.length === 1) {
			return `${list[0]} печатает`;
		}
		return (list.length > maxUsersToPrint
					? list.slice(0, maxUsersToPrint).join(', ') + ' и ещё ' + (list.length - maxUsersToPrint)
					:list.join(', ')
				) + ' печатают';
	});

	Echo.private('chat')
		.listenForWhisper('typing', (e) => {
			typingUsers.value.set(e.name, Date.now());
		});

	function checkUserTyping() {
		var now = Date.now();
		typingUsers.value.forEach((lastAlert, name) => {
			if (now - lastAlert > timeoutUpdating) {
				typingUsers.value.delete(name);
			}
		});
	}

	watch(typingUsers, (actualList) => {
		if (!actualList.value.size) {
			clearInterval(intervalUpdating);
		} else {
			intervalUpdating = setInterval(checkUserTyping, timeoutUpdating);
		}
	})
</script>

<style scoped>

</style>
