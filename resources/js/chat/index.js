import '@/bootstrap.js';
import { createApp, ref } from 'vue'
import App from './components/App.vue';

import Header from '@/chat/components/Header.vue'
import Chat from '@/chat/components/Chat.vue'
import Editor from '@/chat/components/Editor.vue'
import Message from '@/chat/components/Message.vue'
import Textarea from '@/chat/components/Textarea.vue'
import Send from '@/chat/components/Send.vue'

var app = createApp(App);

componentsRegistration(app, {
	Header,
	Chat,
	Editor,
	Message,
	Textarea,
	Send,
})

app.mount('#app');

function componentsRegistration(app, componentsList) {
	Object.entries(componentsList).forEach(([name, component]) => {
		app.component(name, component);
	});
}