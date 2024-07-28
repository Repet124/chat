var form = document.getElementById('formJS');
var name = document.getElementById('name');
var password = document.getElementById('password');
var err = document.getElementById('err');

form.addEventListener('submit', e => {
	e.preventDefault();
	axios.get('/sanctum/csrf-cookie')
		.then(() => axios.post('/login', {
			name: name.value,
			password: password.value
		}))
		.then(() => location = '/chat')
		.catch(() => {
			err.style.display = 'block';
			setTimeout(() => {
				err.style.display = '';
			},2000)
		})
})

