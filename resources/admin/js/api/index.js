import axios from "axios";
import router from "../router/index.js";

const api = axios.create({
    baseURL: ''
})

api.interceptors.request.use(config => {
    if(localStorage.getItem('access_token')) {
        config.headers.authorization = `Bearer ${localStorage.getItem('access_token')}`
    }
    return config;
},error =>{
    return Promise.reject(error)
})

api.interceptors.response.use(response => {
    return response;
}, error => {
    if(error.response.status === 401) {
        if(localStorage.getItem('access_token')) {
            localStorage.removeItem('access_token')
            return router.push('/admin/login')
        }
    }
    return Promise.reject(error)
})

export default api;
