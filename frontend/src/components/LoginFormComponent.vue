<script setup>
import { AuthStore } from '@/stores/AuthStore';
import { ref } from 'vue';
import { useRouter } from 'vue-router';

const router = useRouter()
const email = ref('')
const password = ref('')
const validationErrors = ref({})
const store = AuthStore()

const login = async () => {
  validationErrors.value = {}

  if (!email.value.trim()) {
    validationErrors.value.email = "Email address is required."
  }

  if (!password.value.trim()) {
    validationErrors.value.password = "Password is required."
  } else if (password.value.length < 8 ) {
    validationErrors.value.password = "Password must be at least 8 characters long."
  }

  if (Object.keys(validationErrors.value).length > 0) return

  try {
    const payload = {
      email: email.value.trim(),
      password: password.value.trim()
    }

    const response = await store.login(payload)
    router.push('/')
    console.log('connexion réussie :', response)


  } catch (error) {
    validationErrors.value.email = "Incorrect email or password."
    console.log(error)
  }


}
</script>




<template>
  <form class="space-y-6" @submit.prevent="login">
    <div>
      <label for="email" class="block text-sm/6 font-medium text-gray-100">Email address</label>
      <div class="mt-2">
        <input type="email" v-model="email" name="email" id="email" autocomplete="email" required
          class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" />
        <span v-if="validationErrors.email" class="text-sm text-red-400 mt-1">
          {{ validationErrors.email }}
        </span>
      </div>
    </div>

    <div>
      <div class="flex items-center justify-between">
        <label for="password" class="block text-sm/6 font-medium text-gray-100">Password</label>

      </div>
      <div class="mt-2">
        <input type="password" v-model="password" name="password" id="password" autocomplete="current-password" required
          class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" />
        <span v-if="validationErrors.password" class="text-sm text-red-400 mt-1">
          {{ validationErrors.password }}
        </span>
      </div>
    </div>

    <div>
      <button type="submit"
        class="flex w-full justify-center rounded-md bg-indigo-500 px-3 py-1.5 text-sm/6 font-semibold text-white hover:bg-indigo-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Sign
        in</button>
    </div>
  </form>
</template>
