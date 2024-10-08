<template>
  <div class="mb-8 font-serif">
    <nav
      class="bg-gradient-to-r from-blue-600 via-green-300 to-green-600 border-b border-gray-100"
    >
      <!-- Primary Navigation Menu -->
      <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="flex justify-between h-16">
          <div class="flex items-center">
            <img
              :src="image"
              class="h-12 shadow"
              alt=""
            />
            <div
              class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex font-bold text-xl text-white font-serif"
            >
              Employee's-Portal
            </div>
          </div>

          <!-- Settings Dropdown -->
          <div class="flex items-center">
              <slot name="trigger">
                <div
                  class="flex items-center text-sm font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300 focus:outline-none focus:text-gray-700 focus:border-gray-300 transition duration-150 ease-in-out"
                >
                  <div class="text-white font-bold flex">
                    {{ user.name }}
                  </div>
                </div>
              </slot>
            <a href="#" @click.prevent="logout" class="mt-0.5">
              <i
                class="fas fa-sign-out-alt ml-1 text-white hover:text-blue-600"
              ></i>
            </a>
          </div>
        </div>
      </div>
    </nav>

    <header class="bg-white shadow">
      <div class="max-w-7xl mx-auto flex py-6 px-4 sm:px-6 lg:px-8">
        <p
          class="cursor-pointer font-normal hover:font-bold hover:text-blue-600"
        >
          <i class="fas fa-home"></i>
          <router-link to="/">Home</router-link>
        </p>
        <p
          v-if="user.admin == true"
          class="ml-3 cursor-pointer font-normal hover:font-bold hover:text-blue-600"
        >
          <i class="fas fa-users"></i>
          <router-link to="/Employees">Employees</router-link>
        </p>
        <p
          v-if="user.admin == true"
          class="ml-3 cursor-pointer font-normal hover:font-bold hover:text-blue-600"
        >
          <i class="fas fa-user"></i>
          <router-link to="/Create-Employee">New Employee</router-link>
         </p>
         <!-- <p
          v-if="user.admin == true"
          class="ml-3 cursor-pointer font-normal hover:font-bold hover:text-blue-600"
        >
          <i class="fas fa-user"></i>
          <router-link to="/ImportPrivate">Private Details</router-link>
        </p> -->
      </div>
    </header>
  </div>
</template>

<script>
export default {
  data() {
    return {
      user: window.user,
       image: '/storage/images/logo.jpg', 
    };
  },
  methods: {
    logout() {
      axios.post("/logout").then((res) => (window.location = "/login"));
    },
  },
};
</script>

<style>
</style>