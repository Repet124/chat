import '@/bootstrap.js';
import { createApp, ref } from 'vue'
import App from './components/App.vue';

import Header from '@/chat/components/Header.vue'
import Chat from '@/chat/components/Chat.vue'
import Editor from '@/chat/components/Editor.vue'
import Message from '@/chat/components/Message.vue'
import Textarea from '@/chat/components/Textarea.vue'
import Send from '@/chat/components/Send.vue'
import Loader from '@/chat/components/Loader.vue'
import Modal from '@/chat/components/Modal.vue'
import WritingAlert from '@/chat/components/WritingAlert.vue'
import Dashboard from '@/chat/components/Dashboard.vue'
import Btn from '@/chat/components/Btn.vue'

var app = createApp(App, {
	user: JSON.parse(document.getElementById('app').dataset.user)
});

componentsRegistration(app, {
	Header,
	Chat,
	Editor,
	Message,
	Textarea,
	Send,
	Loader,
	Modal,
	WritingAlert,
	Dashboard,
	Btn
})

app.mount('#app');

function componentsRegistration(app, componentsList) {
	Object.entries(componentsList).forEach(([name, component]) => {
		app.component(name, component);
	});
}
