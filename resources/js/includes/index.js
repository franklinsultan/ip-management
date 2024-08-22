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

export function fetchAddresses() {
    return axios.get('/api/ip-addresses', {
        headers: getToken()
    });
}

export function getIpAddress(ipAddressId) {
    return axios.get(`/api/ip-addresses/${ipAddressId}`, {
        headers: getToken()
    });
}

export function updateIpAddress(ipAddressId, label) {
    return axios.put(`/api/ip-addresses/${ipAddressId}`, { label }, {
        headers: getToken()
    });
}