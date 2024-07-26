import '@/bootstrap.js';
import { createApp, ref } from 'vue'
import App from './components/App.vue';

import Header from '@/chat/components/Header.vue'
import Chat from '@/chat/components/Chat.vue'
import Editor from '@/chat/components/Editor.vue'

var app = createApp(App);

componentsRegistration(app, {
	Header,
	Chat,
	Editor,
})

app.mount('#app');

function componentsRegistration(app, componentsList) {
	Object.entries(componentsList).forEach(([name, component]) => {
		app.component(name, component);
	});
}
