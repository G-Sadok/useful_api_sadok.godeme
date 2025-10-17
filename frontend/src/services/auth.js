import { api } from './api'

export const AuthModel = {
  login(userData) {
    const response = api.post(`/api/login`, userData)
    return response
  },

  register(userData) {
    console.log('Userdata', userData)
    const response = api.post('/api/register', userData)
    return response
  },

}
