<template>
	<p v-if="typingUsers.size" class="text-slate-600">{{usersToPrint}}</p>
</template>

<script setup>
	import { reactive, computed, watch } from 'vue';

	var typingUsers = reactive(new Map());
	var timeoutUpdating = 4000;
	var intervalUpdating = 0;
	var maxUsersToPrint = 3;

	var usersToPrint = computed(() => {
		var list = Array.from(typingUsers.keys());
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
			typingUsers.set(e.name, Date.now());
		});

	function checkUserTyping() {
		var now = Date.now();
		typingUsers.forEach((lastAlert, name) => {
			if (now - lastAlert > timeoutUpdating) {
				typingUsers.delete(name);
			}
		});
	}

	watch(typingUsers, (actualList) => {
		if (!actualList.size) {
			clearInterval(intervalUpdating);
		} else {
			intervalUpdating = setInterval(checkUserTyping, timeoutUpdating);
		}
	})
</script>

<style scoped>

</style>
