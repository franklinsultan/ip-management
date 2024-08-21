import axios from 'axios';

const API_URL = 'http://127.0.0.1:8000/api';

export function register(user) {
    return axios.post(`${API_URL}/register`, user);
}