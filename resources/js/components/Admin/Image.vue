<template>
    <div>
      <section class="max-w-3xl mx-auto mt-3 font-serif">
        <form @submit.prevent="submit" enctype="multipart/form-data">
          <div class="bg-white lg:flex lg:shadow-lg lg:rounded-lg">
            <div class="p-3">
              <span
                @click="showForm = !showForm"
                class="text-xl text-green-500 font-bold md:text-xl cursor-pointer"
                >Employee Documents</span
              >
              <transition name="slide-fade">
                <div v-if="showForm">
                <div v-if="can == true">
                  <div class="mt-2">
                    <p class="text-xs text-gray-500">
                      Attach all required documents below as required. i.e National ID, Bank Account NSSF and NHIF.
                    </p>
                  </div>
                  <div class="mt-2 flex space-x-2">
                    <div class="flex-1">
                      <label class="text-blue-500 font-semibold"
                        >Document Name</label
                      >
                      <input
                        v-model="docName"
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
                        placeholder="Type Document name"
                      />
                      <span class="text-sm text-red-600" v-if="errors.docName">{{
                        errors.docName[0]
                      }}</span>
                      <input
                        type="file"
                        :disabled="can == false"
                        class="form-control mt-3"
                        @change="onChange"
                        ref="fileupload"
                      />
                      <span
                        class="text-sm mt-1 text-red-600"
                        v-if="errors.file"
                        >{{ errors.file[0] }}</span
                      >
                    </div>
                  </div>
  
                  <div  class="flex float-right mt-2 mb-4">
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
                <!-- view -->
                <div>
                    
                  </div>
  
                <!-- view last -->
                  <div>
                    <table class="border-collapse mt-5">
                      <transition-group name="list" tag="p">
                        <tbody v-for="doc in docs" :key="doc.id">
                          <tr v-if="doc.is_type_document" class="hover:bg-grey-lighter">
                            <td>
                              <div
                                class="border rounded-md shadow-md p-2 flex mr-2"
                              >
                                <p class="font-semibold text-blue-600 mr-2">
                                  Document Name:
                                </p>
                                {{ docName }}
                              </div>
                            </td>
                            <td>
                              <div
                                class="border rounded-md shadow-md p-2 flex mr-2"
                              >
                                <p class="font-semibold text-blue-600 mr-2">
                                  File Name:
                                </p>
                                {{ doc.file }}
                              </div>
                            </td>
                            <td>
                              <div class="border rounded-md shadow-md p-2 mr-2">
                                <a
                                  @click.prevent="view(doc)"
                                  class="
                                    cursor-pointer
                                    items-center
                                    px-3
                                    py-2
                                    bg-blue-500
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
                                  >Open</a
                                >
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
                </div>
              </transition>
            </div>
          </div>
        </form>
      </section>
    </div>
  </template>
  
  <script>
  export default {
    props: ["docs","can","is_type_document"],
    data() {
      return {
        showForm: false,
        user: window.user,
        file: "",
        docName: "",
        errors: {},
        employee_id: this.$route.params.id,
        
      };
    },
  
    methods: {
      onChange(e) {
        this.file = e.target.files[0];
      },
      submit() {
        let data = new FormData();
        data.append("file", this.file);
        data.append("docName", this.docName);
        data.append("is_type_document", this.$props.is_type_document);
  
        axios
          .post(`/upload-documents/${this.employee_id}`, data)
          .then((response) => {
            this.$notify({ message: "Uploaded SuccessFully" });
            this.$refs.fileupload.value = null;
            this.docName = "";
            this.$emit("reloadData");
          })
          .catch((e) => {
            this.errors = e.response.data.errors;
          });
      },
      destroy(doc) {
        if (confirm("Are you sure?")) {
          axios.delete(`/removeDoc/${doc.id}`).then(() => {
            this.$emit("reloadData");
            this.$notify({ message: "Deleted", type: "warning" });
          });
        }
      },
      view(doc) {
        window.open("/View/" + doc.id, "_blank");
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