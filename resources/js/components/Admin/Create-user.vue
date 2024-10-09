<template>
    <transition>
      <section class="min-h-screen max-w-3xl mx-auto m-3 font-serif">
        <form @submit.prevent="submit">
          <div class="bg-white lg:flex lg:shadow-lg lg:rounded-lg">
            <div class="p-3 items-center">
              <span
                class="text-xl text-green-500 font-bold md:text-xl cursor-pointer"
                >Create User</span
              >
  
              <div>
                <div class="mt-2">
                  <p class="text-xs text-gray-500">
                    Kindly fill all the fields.If you are not sure of others save
                    and come back later
                  </p>
                </div>
                <div class="mt-4 flex space-x-2">
                  <div class="flex-1">
                    <label class="text-blue-500 font-semibold">Full Name</label>
                    <input
                      v-model="form.name"
                      type="text"
                      class="
                        w-full
                        py-2
                        px-2
                        bg-gray-200
                        rounded-lg
                        shadow-sm
                        focus:outline-none focus:shadow-outline
                        text-gray-600
                      "
                    />
                    <span class="text-sm text-red-600" v-if="errors.name">{{
                      errors.name[0]
                    }}</span>
                  </div>
                </div>
  
                <div class="mt-2 flex space-x-2">
                  <div class="flex-1">
                    <label class="text-blue-500 font-semibold">Email</label>
                    <input
                      v-model="form.email"
                      type="email"
                      class="
                        w-full
                        py-2
                        px-2
                        bg-gray-200
                        rounded-lg
                        shadow-sm
                        focus:outline-none focus:shadow-outline
                        text-gray-600
                      "
                    />
                    <span class="text-sm text-red-600" v-if="errors.email">{{
                      errors.email[0]
                    }}</span>
                  </div>
                  <div class="flex-1">
                    <label class="text-blue-500 font-semibold">Department:</label>
                    <select
                      v-model="form.department"
                      type="text"
                      class="
                        w-full
                        py-2
                        px-2
                        bg-gray-200
                        rounded-lg
                        shadow-sm
                        focus:outline-none focus:shadow-outline
                        text-gray-600
                      "
                    >
                      <option value="">-- Select Dept --</option>
                      <option value="Management">Management</option>
                      <option value="Forestry">Forestry</option>
                      <option value="Human Resources">HR</option>
                      <option value="Information Technology">IT</option>
                      <option value="Operations">Operations</option>
                      <option value="Accounts">Accounts</option>
                      <option value="M&E">M&E</option>
                      <option value="Miti Magazine">Miti Magazine</option>
                      <option value="Communications">Communications</option>
                    </select>
                    <span class="text-sm text-red-600" v-if="errors.department">{{
                      errors.department[0]
                    }}</span>
                  </div>
                  <div class="flex-1">
                    <label class="text-blue-500 font-semibold">Site</label>
                    <select
                      v-model="form.site"
                      type="text"
                      class="
                        w-full
                        py-2
                        px-2
                        rounded-lg
                        shadow-sm
                        focus:outline-none focus:shadow-outline
                        bg-gray-200
                        text-gray-600
                      "
                    >
                      <option value="">-- Select Site --</option>
                      <option value="Head Office">Head Office</option>
                      <option value="Kiambere">Kiambere</option>
                      <option value="Dokolo">Dokolo</option>
                      <option value="Nyongoro">Nyongoro</option>
                      <option value="7 Forks">7 Forks</option>
                      <option value="Kampala">Kampala</option>
                    </select>
                    <span class="text-sm text-red-600" v-if="errors.site">{{
                      errors.site[0]
                    }}</span>
                  </div>
                  <div class="flex-1">
                    <label class="text-blue-500 font-semibold">Password</label>
                    <input
                      v-model="form.password"
                      type="text"
                      class="
                        w-full
                        py-2
                        px-2
                        bg-gray-200
                        rounded-lg
                        shadow-sm
                        focus:outline-none focus:shadow-outline
                        text-gray-600
                      "
                    />
                    <span class="text-sm text-red-600" v-if="errors.password">{{
                      errors.password[0]
                    }}</span>
                  </div>
                </div>
  
                <div class="flex float-right mt-2">
                  <button
                    class="
                      items-center
                      px-3
                      py-2
                      bg-green-500
                      border
                      rounded-md
                      text-xs text-white
                      hover:bg-blue-800
                      focus:outline-none focus:ring
                      ring-gray-300
                      transition
                      ease-in-out
                      duration-150
                    "
                  >
                    Save
                  </button>
                </div>
              </div>
            </div>
          </div>
        </form>
      </section>
    </transition>
  </template>
  
  <script>
  export default {
    data() {
      return {
        user: window.user,
        form: {
          name: "",
          email: "",
          department: "",
          site: "",
        },
        errors: {},
      };
    },
  
    methods: {
      submit() {
        axios
          .post("/Create-user", this.form)
          .then((response) => {
            this.$router.push("/Employees");
          })
          .catch((e) => {
            this.errors = e.response.data.errors;
          });
      },
    },
  };
  </script>
  
  <style>
  .v-enter-active,
  .v-leave-active {
    transition: opacity 0.5s ease;
  }
  
  .v-enter-from,
  .v-leave-to {
    opacity: 0;
  }
  </style>