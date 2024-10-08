<template>
  <div>
    <section class="max-w-3xl mx-auto mt-3 font-serif">
      <form @submit.prevent="submit(form)">
        <div class="bg-white lg:flex lg:shadow-lg lg:rounded-lg">
          <div class="p-3 items-center">
            <span
              @click="showForm = !showForm"
              class="text-xl text-green-500 font-bold md:text-xl cursor-pointer"
              >Emergency Contact Information</span
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
                    <label class="text-blue-500 font-semibold">Full Name</label>
                    <input
                      v-model="form.Fname"
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
                    <span class="text-sm text-red-600" v-if="errors.Fname">{{
                      errors.Fname[0]
                    }}</span>
                  </div>
                </div>

                <div class="mt-2 flex space-x-2">
                  <div class="flex-1">
                    <label class="text-blue-500 font-semibold"
                      >Street Address</label
                    >
                    <input
                      v-model="form.street"
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
                      >Apartment/Unit</label
                    >
                    <input
                      v-model="form.apartment"
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
                    <label class="text-blue-500 font-semibold">City</label>
                    <input
                      v-model="form.city"
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
                    <label class="text-blue-500 font-semibold">State</label>
                    <input
                      v-model="form.state"
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
                      >Postal Code</label
                    >
                    <input
                      v-model="form.Zcode"
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
                      >Primary Phone</label
                    >
                    <input
                      v-model="form.Pphone"
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
                    <span class="text-sm text-red-600" v-if="errors.Pname">{{
                      errors.Pname[0]
                    }}</span>
                  </div>
                  <div class="flex-1">
                    <label class="text-blue-500 font-semibold"
                      >Alternate Phone:</label
                    >
                    <input
                      v-model="form.Aphone"
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
                      >Relationship</label
                    >
                    <textarea
                      v-model="form.relationship"
                      type="text"
                      :disabled="can == false"
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
                    </textarea>
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
  components: { Datepicker },
  props: ["form","can"],
  data() {
    return {
      showForm: false,
      IsMarried: false,
      user: window.user,
      errors: {},
    };
  },

  methods: {
    getStatus() {
      if (this.form.status == "married") {
        this.IsMarried = true;
      } else {
        this.IsMarried = false;
      }
    },

    submit(form) {
      axios
        .post(`/Emergency-contact/${form.user_id}`, this.form)
        .then((response) => {
          this.$notify({ message: "Saved Successfully" });
          this.showForm = false;
          this.form = "";
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
.slide-fade-enter-active {
  transition: all 0.8s cubic-bezier(1, 0.5, 0.8, 1);
}
.slide-fade-leave-active {
  transition: all 0.8s cubic-bezier(1, 0.5, 0.8, 1);
}
.slide-fade-enter,
.slide-fade-leave-to {
  transform: translateX(10px);
  opacity: 0;
}
</style>