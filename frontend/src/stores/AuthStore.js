import { defineStore } from "pinia";
import { AuthModel } from "@/services/auth";



export const AuthStore = defineStore('auth', {
  state: () => {
    return  {
      user: [],
      token: null,
    }
  },


  actions: {

    // User Registration
    async register(userData) {
      try {
        console.log(userData)
        // Champs obligatoires
        if (!userData.name || !userData.email || !userData.password) {
          return alert("All fields are required.")
        }

        // Mots de passe
        if (userData.password.length < 8) {
          return alert("Password must be at least 8 characters long.")
        }

        const response = await AuthModel.register(userData)
        console.log("Registration successful!")
        console.log(response)
        return response
      } catch (error) {
        console.error('*Error register:', error)
        throw error
      }
    },

    // Connexion utilisateur
    async login(userData) {
      try {
        const response = await AuthModel.login(userData)
        const data = response.data

        this.token = data.token
        this.data = JSON.stringify(data[0])
        console.log(data.user)

        localStorage.setItem('token', data.token)
        localStorage.setItem('user', this.data)
        return data
      } catch (error) {
        console.error('*Error login:', error)
        throw error
      }
    },

  },

  persist: { key: 'usersData', storage: localStorage },
})
