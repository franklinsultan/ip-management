import axios from 'axios';

export function register(user) {
    return axios.post('/api/register', user);
}

export function login(user) {
    return axios.post('/api/login', user)
        .then(response => {
            if (response.data.token) {
                localStorage.setItem('user-token', response.data.token);
            }
            return response.data;
        });
}