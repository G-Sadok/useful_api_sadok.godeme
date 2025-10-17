<script setup>
import { useRouter } from 'vue-router';
import { AuthStore } from '@/stores/AuthStore';

const store = AuthStore();
const router = useRouter();

const logout = async () => {

  try {

    await store.logout()
    console.log("Déconnexion effectuée")
    router.push('/login')
  } catch (error) {
    alert("**Error during logging out.")
    console.error(error)
  }
}
</script>

<template class="h-full m-full">
  <h1 class="text-white font-bold flex items-center justify-center">WELCOME TO THE DASHBOARD</h1>
  <div class="flex items-center justify-center">
    <button type="submit" @click="logout"
      class="flex w-[130px] justify-center rounded-md bg-red-500 px-3 py-1.5 text-sm/6 font-semibold text-white hover:bg-red-400 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-red-500">LOGOUT</button>
  </div>
</template>
