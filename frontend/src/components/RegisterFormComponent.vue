<script setup>
import { ref } from 'vue';
import { useRouter } from 'vue-router';
import { AuthStore } from '@/stores/AuthStore';

const store = AuthStore();
const router = useRouter();

const userData = ref({
  name: '',
  email: '',
  password: '',
})

const registration = async () => {


  const { name, email, password } = userData.value

  try {
    const payload = { name, email, password }
    console.log(payload)
    const response = await store.register(payload)
    router.push('login')
    console.log(response)
  } catch (error) {
    alert("**Error during registration.")
    console.error(error)
  }
}


</script>
<template>
  <form class="space-y-6" @submit.prevent="registration">
    <div>
      <label for="name" class="block text-sm/6 font-medium text-gray-100">Name</label>
      <div class="mt-2">
        <input type="text" name="name" id="name" v-model="userData.name" autocomplete="name" required
          class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" />
      </div>
    </div>
    <div>
      <label for="email" class="block text-sm/6 font-medium text-gray-100">Email address</label>
      <div class="mt-2">
        <input type="email" v-model="userData.email" name="email" id="email" autocomplete="email" required
          class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" />
      </div>
    </div>

    <div>
      <div class="flex items-center justify-between">
        <label for="password" class="block text-sm/6 font-medium text-gray-100">Password</label>

      </div>
      <div class="mt-2">
        <input type="password" name="password" id="password" autocomplete="current-password" required
          v-model="userData.password" placeholder="Password..." minlength="8"
          class="block w-full rounded-md bg-white/5 px-3 py-1.5 text-base text-white outline-1 -outline-offset-1 outline-white/10 placeholder:text-gray-500 focus:outline-2 focus:-outline-offset-2 focus:outline-indigo-500 sm:text-sm/6" />
      </div>
    </div>

    <div>
      <button type="submit"
        class="flex w-full justify-center rounded-md bg-indigo-500 px-3 py-1.5 text-sm/6 font-semibold text-white hover:bg-indigo-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-500">Sign
        up</button>
    </div>
  </form>

</template>
