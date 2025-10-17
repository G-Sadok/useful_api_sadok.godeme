import axios from "axios";


// const API_URL = import.meta.env.VITE_API_URL;
const API_URL = "http://127.0.0.1:8000";

export const api = axios.create({
  baseURL: API_URL,
  withCredentials: true,

});

api.interceptors.request.use(config => {
  config.headers.Authorization = `Bearer ${localStorage.getItem('token')}`
  config.headers["Content-Type"] = 'application/json'
  config.headers.Accept = 'application/json'
  return config;
})
