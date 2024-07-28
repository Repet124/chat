var form = document.getElementById('formJS');
var username = document.getElementById('username');
var name = document.getElementById('name');
var password = document.getElementById('password');
var err = document.getElementById('err');

form.addEventListener('submit', e => {
	e.preventDefault();
	axios.get('/sanctum/csrf-cookie')
		.then(() => axios.post('/regester', {
			username: username.value,
			name: name.value,
			password: password.value
		}))
		.then(() => location = '/')
		.catch(() => {
			err.style.display = 'block';
			setTimeout(() => {
				err.style.display = '';
			},2000)
		})
});
