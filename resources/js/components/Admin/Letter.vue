<template>
  <div>
    <section class="max-w-3xl mx-auto mt-3 mb-20 font-serif">
      <form @submit.prevent="submit" enctype="multipart/form-data">
        <div class="bg-white lg:flex lg:shadow-lg lg:rounded-lg">
          <div class="p-3 w-full">
            <span
              @click="showForm = !showForm"
              class="text-xl text-green-500 font-bold md:text-xl cursor-pointer"
              >Letters for this Employee</span
            >
            <transition name="slide-fade">
              <div v-if="showForm">
                <div>
                  <table class="min-w-full block md:table border-collapse mt-2">
                      <thead>
                        <tr>
                          <td><p class="font-semibold text-blue-600 mr-2">Letter Type</p></td>
                          <td><p class="font-semibold text-blue-600 mr-2">file</p></td>
                          <td><p class="font-semibold text-blue-600 mr-2">Date Created</p></td>
                          <td><p class="font-semibold text-blue-600 mr-2">Action</p></td>
                        </tr>
                      </thead>
                        <tbody  v-for="doc in docs" :key="doc.id">
                          <tr class="hover:bg-grey-lighter">
                            <td>
                                {{ doc.type }} 
                            </td>
                            <td>
                                <a class="cursor-pointer text-blue-600 hover:text-blue-800"
                                  @click.prevent="view(doc)">
                                  {{ doc.file }}
                                </a>                                
                            </td>
                            <td>
                                {{  new Date(doc.created_at).toLocaleDateString()}}>
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
export default {
  props: ["docs","can"],
  data() {
    return {
      showForm: false,
      user: window.user,
      employee_id: this.$route.params.id,
    };
  },

  methods: {
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