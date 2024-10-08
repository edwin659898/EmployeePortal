<template>
  <div class="min-h-screen">
    <div v-if="loading" class="px-6 py-4">Loading...</div>
    <div v-else>
      <template>
        <a href="#" @click="$router.back()">
          <div
            class="flex items-center mb-1 cursor-pointer text-blue-600 hover:underline lg:px-12"
          >
            <svg
              xmlns="http://www.w3.org/2000/svg"
              class="h-6 w-6"
              fill="none"
              viewBox="0 0 24 24"
              stroke="currentColor"
            >
              <path
                stroke-linecap="round"
                stroke-linejoin="round"
                stroke-width="2"
                d="M12.066 11.2a1 1 0 000 1.6l5.334 4A1 1 0 0019 16V8a1 1 0 00-1.6-.8l-5.333 4zM4.066 11.2a1 1 0 000 1.6l5.334 4A1 1 0 0011 16V8a1 1 0 00-1.6-.8l-5.334 4z"
              /></svg
            >Go Back
          </div>
        </a>
        <app-employeeedit :forms="data" />
      </template>
    </div>
  </div>
</template>

<script>
import AppEmployeeedit from "../components/Admin/EmployeeEdit";
export default {
  components: { AppEmployeeedit },
  mounted() {
    this.fetchData();
  },

  data() {
    return {
      data: [],
      loading: true,
    };
  },

  methods: {
    fetchData() {
      axios
        .get("/EmployeeView/" + this.$route.params.id)
        .then((response) => {
          this.data = response.data.data;
          this.loading = false;
          if (response.data.data.salutation === null) {
            this.$router.push("/Employees");
            alert("No data available for this Employee");
          }
        })
        .catch((e) => {
          this.errors = e.response.data;
          this.loading = false;
        });
    },
  },
};
</script>

<style>
</style>