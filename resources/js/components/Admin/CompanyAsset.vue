<template>
  <div>
    <section class="max-w-3xl mx-auto mt-3 font-serif">
      <form @submit.prevent="submit">
        <div class="bg-white lg:flex lg:shadow-lg lg:rounded-lg">
          <div class="p-3 w-full">
            <span
              @click="showForm = !showForm"
              class="text-xl text-green-500 font-bold md:text-xl cursor-pointer"
              >Company Assets Allocated</span
            >
            <transition name="slide-fade">
              <div v-if="showForm">
<!-- title of the card -->
               <div v-if="can == true">
                  <div class="mt-2">
                    <p class="text-xs text-gray-500">
                      Input all assets owned by this employee
                    </p>
                  </div>
<!-- === -->
                  <div  class="mt-2 flex space-x-2">
                    <div class="flex-1 w-full">
                      <label class="text-blue-500 font-semibold"
                        >Asset Name</label
                      >
                      <input
                        v-model="form.AssetName"
                        placeholder="Type Asset Name"
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
                        v-if="errors.AssetName"
                        >{{ errors.AssetName[0] }}</span
                      >
                    </div>
                    <div class="flex-1">
                      <label class="text-blue-500 font-semibold"
                        >Description</label
                      >
                      <textarea
                        v-model="form.comment"
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
                      </textarea>
                    </div>
                    <div class="flex-1">
                      <label class="text-blue-500 font-semibold"
                        >Date of issue</label
                      >
                      <datepicker
                        v-model="form.IssueDate"
                        name="uniquename"
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
                      <span
                        class="text-sm text-red-600"
                        v-if="errors.IssueDate"
                        >{{ errors.IssueDate[0] }}</span
                      >
                    </div>
                  </div>

                  <div class="flex float-right mt-2 mb-4">
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

                <div>
                  <table class="text-left w-full border-collapse mt-2">
                    <transition-group name="list" tag="p">
                      <tbody v-for="doc in docs" :key="doc.id">
                        <tr class="hover:bg-grey-lighter">
                          <td>
                            <div
                              class="border rounded-md shadow-md p-2 flex mr-2"
                            >
                              <p class="font-semibold text-blue-600">
                                Asset Name:
                              </p>
                              {{ doc.asset_name }}
                            </div>
                          </td>
                          <td>
                            <div
                              class="border rounded-md shadow-md p-2 flex mr-2"
                            >
                              <p class="font-semibold text-blue-600 mr-2">
                                Description:
                              </p>
                              {{ doc.comment }}
                            </div>
                          </td>
                          <td>
                            <div
                              class="border rounded-md shadow-md p-2 flex mr-2"
                            >
                              <p class="font-semibold text-blue-600 mr-2">
                                Date Issued:
                              </p>
                              {{  new Date(doc.date_issued).toLocaleDateString()}}
                            </div>
                          </td>
                          <td v-if="can == true">
                            <div class="border rounded-md shadow-md p-2 mr-2">
                              <button
                                @click.prevent="destroy(doc)"
                                :disabled="can == false"
                                class="
                                  items-center
                                  px-3
                                  py-2
                                  bg-red-500
                                  border
                                  rounded-md
                                  text-xs text-white
                                  hover:bg-red-800
                                  focus:outline-none focus:ring
                                  ring-gray-300
                                  transition
                                  ease-in-out
                                  duration-150
                                "
                              >
                                Delete
                              </button>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </transition-group>
                  </table>
                </div>
                <!-- - --->
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
import moment from "moment";
export default {
  components: { Datepicker },
  props: ["docs","can"],
  data() {
    return {
      showForm: false,
      user: window.user,
      form: {
        AssetName: "",
        comment: "",
        IssueDate: "",
      },
      errors: {},
      employee_id: this.$route.params.id,
    };
  },

  methods: {
    submit() {
      axios
        .post(`/company-asset/${this.employee_id}`,this.form)
        .then((response) => {
          this.$notify({ message: "Uploaded SuccessFully" });
          this.form.AssetName = "";
          this.form.comment = "";
          this.form.IssueDate = "";
          this.$emit("reloadData");
        })
        .catch((e) => {
          this.errors = e.response.data.errors;
        });
    },
    destroy(doc) {
      if (confirm("Are you sure?")) {
        axios.delete(`/remove-asset/${doc.id}`).then(() => {
          this.$emit("reloadData");
          this.$notify({ message: "Deleted", type: "warning" });
        });
      }
    },
  },
};
</script>

<style>
.list-item {
  display: inline-block;
  margin-right: 10px;
}
.list-enter-active,
.list-leave-active {
  transition: all 1s;
}
.list-enter, .list-leave-to /* .list-leave-active below version 2.1.8 */ {
  opacity: 0;
  transform: translateX(-30px);
}
</style>