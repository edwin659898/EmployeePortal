<template>
  <div>
    <section class="max-w-3xl mx-auto mt-3 font-serif">
      <form @submit.prevent="submit" enctype="multipart/form-data">
        <div class="bg-white lg:flex lg:shadow-lg lg:rounded-lg">
          <div class="p-3 w-full">
            <span
              @click="showForm = !showForm"
              class="text-xl text-green-500 font-bold md:text-xl cursor-pointer"
              >Trainings Attended by this Employee</span
            >
            <transition name="slide-fade">
              <div v-if="showForm">

                <div v-if="can == true">
                <div class="mt-2">
                  <p class="text-xs text-gray-500">
                    List All Trainings and attach certificated if available
                  </p>
                </div>
                <div class="mt-2 flex space-x-2">
                  <div class="flex-1">
                    <label class="text-blue-500 font-semibold"
                      >Training Name</label
                    >
                    <input
                      v-model="trainingName"
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
                      placeholder="Type training name"
                    />
                    <p class="text-sm text-red-600" v-if="errors.trainingName">{{
                      errors.trainingName[0]
                    }}</p>                    
                  </div>
                  <div class="flex-1">
                    <label class="text-blue-500 font-semibold"
                      >Trainer</label
                    >
                    <input
                      v-model="trainer"
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
                      placeholder="Trainer"
                    />
                    <p class="text-sm text-red-600" v-if="errors.trainer">{{
                      errors.trainer[0]
                    }}</p>                    
                  </div>
                  <div class="flex-1">
                    <label class="text-blue-500 font-semibold"
                      >Training company</label
                    >
                    <input
                      v-model="trainingCompany"
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
                      placeholder="Training Company"
                    />
                    <p class="text-sm text-red-600" v-if="errors.trainingCompany">{{
                      errors.trainingCompany[0]
                    }}</p>                    
                  </div>
                </div>

             <div class="mt-2 flex space-x-2">
               <div class="flex-1">
                    <label class="text-blue-500 font-semibold"
                      >Training type</label
                    >
                    <select
                      v-model="type"
                      :disabled="can == false"
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
                      <option value="">-- Select Type --</option>
                      <option value="internal">Internal</option>
                      <option value="external">External</option>
                    </select>
                    <p class="text-sm text-red-600" v-if="errors.type">{{
                      errors.type[0]
                    }}</p>                    
                  </div>
                  <div class="flex-1">
                    <label class="text-blue-500 font-semibold mt-2"
                      >Date completed</label
                    >
                     <datepicker
                      v-model="date"
                      name="uniquename"
                      class="py-2 px-2 bg-gray-200 rounded-lg shadow-sm focus:outline-none focus:shadow-outline text-gray-600"
                    ></datepicker>
                    <p class="text-sm text-red-600" v-if="errors.date">{{
                      errors.date[0]
                    }}</p>
                  </div>
                  <div class="flex-1">
                    <label class="text-blue-500 font-semibold"
                      >Certificate Issued:</label
                    >
                    <select
                      v-model="Certstatus"
                      :disabled="can == false"
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
                      <option value="yes">Yes</option>
                      <option value="no">No</option>
                    </select>
                     <p class="text-sm text-red-600" v-if="errors.Certstatus">{{
                      errors.Certstatus[0]
                    }}</p>
                  </div>
                </div>

                <transition name="slide-fade">
                  <div v-if="IsIssued">
                    <div class="mt-2 flex space-x-2">
                      <div class="flex-1">
                          <input
                            type="file"
                            class="form-control mt-3"
                            @change="onChange"
                            ref="fileupload"
                          />
                          <p class="text-sm text-red-600" v-if="errors.file">{{
                            errors.file[0]
                          }}</p>
                      </div>
                    </div>
                  </div>
                </transition>

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
                  <table class="min-w-full block md:table border-collapse mt-2">
                      <thead>
                        <tr>
                          <td><p class="font-semibold text-blue-600 mr-2">Document Name</p></td>
                          <td><p class="font-semibold text-blue-600 mr-2">Date Graduated</p></td>
                          <td><p class="font-semibold text-blue-600 mr-2">File Name</p></td>
                          <td><p class="font-semibold text-blue-600 mr-2">Trainer</p></td>
                          <td><p class="font-semibold text-blue-600 mr-2">Training Company</p></td>
                          <td><p class="font-semibold text-blue-600 mr-2">Action</p></td>
                        </tr>
                      </thead>
                        <tbody  v-for="doc in docs" :key="doc.id">
                          <tr class="hover:bg-grey-lighter">
                            <td>
                                {{ doc.training_name }} 
                            </td>
                            <td>
                                {{  new Date(doc.date_completed).toLocaleDateString()}}
                            </td>
                            <td>
                                <a class="cursor-pointer text-blue-600 hover:text-blue-800"
                                  @click.prevent="view(doc)">
                                  {{ doc.file }}
                                </a>                                
                            </td>
                            <td>
                                {{ doc.trainer }} 
                            </td>
                            <td>
                                {{ doc.training_company }} 
                            </td>
                            <td v-if="can == true">
                              <div class="flex space-x-2">
                                <button
                                  @click.prevent="destroy(doc)"
                                  :disabled="can == false">
                                  <i class="fas fa-trash text-red-500 hover:text-red-800"></i>
                                </button>
                              </div>
                            </td>
                          </tr>
                        </tbody>
                  </table>
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
  props: ["docs","can"],
  data() {
    return {
      showForm: false,
      user: window.user,
      file: "",
      trainingName: "",
      trainer: "",
      trainingCompany: "",
      type: "",
      Certstatus: "",
      date: "",
      IsIssued: false,
      errors: {},
      employee_id: this.$route.params.id,
    };
  },

  methods: {
    onChange(e) {
      this.file = e.target.files[0];
    },
    submit() {
      let form = new FormData();
      form.append("file", this.file);
      form.append("date", this.date);
      form.append("trainingName", this.trainingName);
      form.append("trainer", this.trainer);
      form.append("type", this.type);
      form.append("trainingCompany", this.trainingCompany);
      form.append("Certstatus", this.Certstatus);

      axios.post(`/training-record/${this.employee_id}`, form)
        .then((response) => {
          this.$notify({ message: "Uploaded SuccessFully" });
          this.$emit("reloadData");
          this.date= "";
          this.trainingName= "";
          this.trainer= "";
          this.trainingCompany= "";
          this.Certstatus= "";
          this.$refs.fileupload.value = null;
        })
        .catch((e) => {
          this.errors = e.response.data.errors;
        });
    },
    destroy(doc) {
      if (confirm("Are you sure?")) {
        axios
          .delete(`/remove-training/${doc.id}`)
          .then(() => {
            this.$emit("reloadData");
            this.$notify({ message: "Deleted", type: "warning" });
          });
      }
    },
    view(doc) {
      window.open("/TrainingDoc/" + doc.id, "_blank");
    },
    getStatus() {
      if (this.Certstatus == "yes") {
        this.IsIssued = true;
      } else {
        this.IsIssued = false;
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