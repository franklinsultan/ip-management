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

function getToken() {
    let token = localStorage.getItem('user-token');
    
    if (! token) {
        return {};
    }

    return { Authorization: 'Bearer ' + token };
} 

export function addIpAddress(data) {
    return axios.post('/api/ip-addresses', data, {
        headers: getToken()
    });
}