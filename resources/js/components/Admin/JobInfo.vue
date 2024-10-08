<template>
  <div>
    <section class="max-w-3xl mx-auto mt-3 font-serif">
      <form @submit.prevent="submit(form)">
        <div class="bg-white lg:flex lg:shadow-lg lg:rounded-lg">
          <div class="p-3">
            <span
              @click="showForm = !showForm"
              class="text-xl text-green-500 font-bold md:text-xl cursor-pointer"
              >Job Information</span
            >
            <transition name="slide-fade">
              <div v-if="showForm">
                <div class="mt-2">
                  <p class="text-xs text-gray-500">
                    Kindly fill all the fields.If you are not sure of others
                    save and come back later
                  </p>
                </div>
                <div class="mt-4 flex space-x-2">
                  <div class="flex-1">
                    <label class="text-blue-500 font-semibold">Job Title</label>
                    <input
                      v-model="form.title"
                      type="text"
                      :disabled="can == false"
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
                    <span class="text-sm text-red-600" v-if="errors.title">{{
                      errors.title[0]
                    }}</span>
                  </div>
                  <div class="flex-1">
                    <label class="text-blue-500 font-semibold"
                      >Employee ID</label
                    >
                    <input
                      v-model="form.EmployeeId"
                      type="text"
                      :disabled="can == false"
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
                  </div>
                  <div class="flex-1">
                    <label class="text-blue-500 font-semibold"
                      >Supervisor</label
                    >
                    <input
                      v-model="form.supervisor"
                      type="text"
                      :disabled="can == false"
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
                    <span
                      class="text-sm text-red-600"
                      v-if="errors.supervisor"
                      >{{ errors.supervisor[0] }}</span
                    >
                  </div>
                </div>

                <div class="mt-2 flex space-x-2">
                  <div class="flex-1">
                    <label class="text-blue-500 font-semibold"
                      >Department</label
                    >
                    <input
                      v-model="form.department"
                      type="text"
                      :disabled="can == false"
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
                    <span
                      class="text-sm text-red-600"
                      v-if="errors.department"
                      >{{ errors.department[0] }}</span
                    >
                  </div>
                  <div class="flex-1">
                    <label class="text-blue-500 font-semibold"
                      >Work Location</label
                    >
                    <input
                      v-model="form.Wlocation"
                      type="text"
                      :disabled="can == false"
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
                    <span class="text-sm text-red-600" v-if="errors.Wlocation">{{
                      errors.Wlocation[0]
                    }}</span>
                  </div>
                </div>

                <div class="mt-2 flex space-x-2">
                  <div class="flex-1">
                    <label class="text-blue-500 font-semibold"
                      >Job E-mail Address</label
                    >
                    <input
                      v-model="form.Wemail"
                      type="email"
                      :disabled="can == false"
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
                  </div>
                </div>

                <div class="mt-2 flex space-x-2">
                  <div class="flex-1">
                    <label class="text-blue-500 font-semibold"
                      >Work Phone</label
                    >
                    <input
                      v-model="form.Wphone"
                      type="text"
                      :disabled="can == false"
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
                  </div>
                  <div class="flex-1">
                    <label class="text-blue-500 font-semibold"
                      >Cell Phone:</label
                    >
                    <input
                      v-model="form.Cphone"
                      type="text"
                      :disabled="can == false"
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
                  </div>
                </div>

                <div class="mt-2 flex space-x-2">
                  <div class="flex-1">
                    <label class="text-blue-500 font-semibold"
                      >Start Date</label
                    >
                    <datepicker
                      v-model="form.Sdate"
                      name="uniquename"
                      :disabled="can == false"
                      class="
                        py-2
                        px-2
                        bg-gray-200
                        rounded-lg
                        shadow-sm
                        focus:outline-none focus:shadow-outline
                        text-gray-600
                      "
                    ></datepicker>
                  </div>
                </div>

                <div v-if="can == true" class="flex float-right mt-2">
                  <button
                  :disabled="can == false"
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
            </transition>
          </div>
        </div>
      </form>
    </section>
  </div>
</template>

<script>
import Datepicker from "vuejs-datepicker";
export default {
  props: ["form","can"],
  components: { Datepicker },
  data() {
    return {
      showForm: false,
      user: window.user,
      errors: {},
    };
  },

  methods: {
    submit(form) {
      axios
        .post(`/Job-details/${form.user_id}`, this.form)
        .then((response) => {
          this.$notify({ message: "Created Successfully" });
          this.showForm = false;
          this.$emit("reloadData");
        })
        .catch((e) => {
          this.errors = e.response.data.errors;
        });
    },
  },
};
</script>

<style>
</style>