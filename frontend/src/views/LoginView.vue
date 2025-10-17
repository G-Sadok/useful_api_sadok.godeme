<script setup>
import LoginComponent from '@/components/LoginComponent.vue';
</script>

<template>


  <div class="flex min-h-full flex-1 flex-col justify-center px-6 py-12 lg:px-8">
    <div class="sm:mx-auto sm:w-full sm:max-w-sm">
      <img class="mx-auto my-auto h-10 w-[200px] h-auto" src="../../public/img/usefull_withoutback.png"
        alt="Usefull_App_Logo" />
      <h2 class="mt-10 text-center text-2xl/9 font-bold tracking-tight text-white">Sign in to your account</h2>
    </div>

    <div class="mt-10 sm:mx-auto sm:w-full sm:max-w-sm">
      <LoginComponent/>

      <p class="mt-10 text-center text-sm/6 text-gray-400">
        Not a member?

        <router-link to="/register" class="font-semibold text-indigo-400 hover:text-indigo-300">Create Account
          Now</router-link>
      </p>
    </div>
  </div>


</template>
