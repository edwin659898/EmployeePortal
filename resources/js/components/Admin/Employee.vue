<template>
  <div>
    <section class="max-w-3xl mx-auto mt-3 font-serif">
      <form @submit.prevent="update(form)">
        <div class="bg-white lg:flex lg:shadow-lg lg:rounded-lg">
          <div class="p-3">
            <span
              @click="showForm = !showForm"
              class="text-xl text-green-500 font-bold md:text-xl cursor-pointer"
              >Personal Information</span
            >
            <transition name="slide-fade">
              <div v-if="showForm">
                <div class="mt-2">
                  <p class="text-xs text-gray-500">
                    Some Fields such as Full names,DOB and National ID are
                    compulsory
                  </p>
                </div>
                <div class="mt-4 flex space-x-2">
                  <div class="flex-1">
                    <label class="text-blue-500 font-semibold">Title</label>
                    <select
                      v-model="form.salutation"
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
                      <option value="">-- Select Title --</option>
                      <option value="Mr">Mr</option>
                      <option value="Miss">Miss</option>
                      <option value="Mrs">Mrs</option>
                      <option value="Dr">Dr</option>
                    </select>
                  </div>
                  <div class="flex-1">
                    <label class="text-blue-500 font-semibold">Full Name</label>
                    <input
                      v-model="form.Fname"
                      placeholder="(Surname) Other Names"
                      :disabled="can == false"
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
                      >Home Phone</label
                    >
                    <input
                      v-model="form.Hphone"
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
                </div>

                <div class="mt-2 flex space-x-2">
                  <div class="flex-1">
                    <label class="text-blue-500 font-semibold"
                      >Personal Email Address</label
                    >
                    <input
                      v-model="form.Pemail"
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
                    <span class="text-sm text-red-600" v-if="errors.Pemail">{{
                      errors.Pemail[0]
                    }}</span>
                  </div>
                </div>

                <div class="mt-2 flex space-x-2">
                  <div class="flex-1">
                    <label class="text-blue-500 font-semibold"
                      >National ID
                    </label>
                    <input
                      v-model="form.nationalId"
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
                      v-if="errors.nationalId"
                      >{{ errors.nationalId[0] }}</span
                    >
                  </div>
                  <div class="flex-1">
                    <label class="text-blue-500 font-semibold"
                      >Tax Pin Number
                    </label>
                    <input
                      v-model="form.Krapin"
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
                      >NSSF number</label
                    >
                    <input
                      v-model="form.nssf"
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
                      >NHIF Number</label
                    >
                    <input
                      v-model="form.nhif"
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
                    <label class="text-blue-500 font-semibold">Bank Name</label>
                    <input
                      v-model="form.Bankname"
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
                      >Account Number</label
                    >
                    <input
                      v-model="form.AccNo"
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
                      >Branch Name</label
                    >
                    <input
                      v-model="form.Branchname"
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
                      >Branch Code</label
                    >
                    <input
                      v-model="form.Branchcode"
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
                      >Birth Date</label
                    >
                    <datepicker
                      v-model="form.dob"
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
                    <span class="text-sm text-red-600" v-if="errors.dob">{{
                      errors.dob[0]
                    }}</span>
                  </div>
                  <div class="flex-1">
                    <label class="text-blue-500 font-semibold"
                      >Marital Status:</label
                    >
                    <select
                      v-model="form.status"
                      @change="getStatus"
                      type="text"
                      class="
                        w-full
                        py-1
                        rounded-lg
                        shadow-sm
                        focus:outline-none focus:shadow-outline
                        bg-gray-200
                        text-gray-600
                      "
                    >
                      <option value="">-- Select Status --</option>
                      <option value="single">Single</option>
                      <option value="married">Married</option>
                    </select>
                  </div>
                </div>

                <transition name="slide-fade">
                  <div v-if="IsMarried">
                    <div class="mt-2 flex space-x-2">
                      <div class="flex-1">
                        <label class="text-blue-500 font-semibold"
                          >Spouse’s Name</label
                        >
                        <input
                          v-model="form.spouseN"
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
                          >Spouse’s Employer</label
                        >
                        <input
                          v-model="form.spouseE"
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
                          >Spouse’s Work Phone</label
                        >
                        <input
                          v-model="form.spousePhone"
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
                  </div>
                </transition>

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

    update(form) {
      axios
        .post(`/Personal-details/${form.user_id}`, this.form)
        .then((response) => {
          this.$notify({ message: "Updated Successfully" });
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