import axios from 'axios';

const api = axios.create({
    baseURL: 'http://localhost/teste-contato-seguro/api'
});

export default api;