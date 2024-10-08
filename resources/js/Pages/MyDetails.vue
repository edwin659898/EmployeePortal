<template>
  <div class="min-h-screen" >
     <bridge-notify />
     <div>
       <h3 class="text-blue-500 text-center font-bold text-xl">{{ data.name }} Information Sheet</h3>
     </div>
        <app-employee :form="data.employees ?? ''" :can="canWrite" @reloadData='fetchData'/>
        <app-jobinfo :form="data.job_infos ?? ''" :can="canWrite" @reloadData='fetchData'/>
        <app-emergencyC :form="data.emergency ?? ''" :can="canWrite" @reloadData='fetchData'/>


        <!-- <app-image :form="data.images ?? ''" :can="canWrite" @reloadData='fetchData'/> -->
        <!-- <app-image :form="data.images ?? ''" :can="canWrite" @reloadData='fetchData'/> -->
        <app-image :docs="data.images ?? ''" :can="canWrite" @reloadData='fetchData'/>
        

        <!-- <app-imageprivate :docs="data.ImagePrivate ?? ''" :can="canWrite" @reloadData='fetchData'/> -->
        <app-companyAsset :docs="data.assets ?? ''" :can="canWrite" @reloadData='fetchData'/>
        <app-training :docs="data.trainings ?? ''" :can="canWrite" @reloadData='fetchData'/>
        <!-- <app-letter :docs="data.letters ?? ''" :can="canWrite" @reloadData='fetchData'/> -->
  </div>
</template>

<script>
import AppEmployee from "../components/Admin/Employee";
import AppJobinfo from "../components/Admin/JobInfo";
import AppEmergencyC from "../components/Admin/EmergencyC";
import AppImage from "../components/Admin/Image";
import AppLetter from "../components/Admin/Letter";
     
// import AppImagePrivate from "../components/Admin/ImagePrivate";

import AppCompanyAsset from "../components/Admin/CompanyAsset";
import AppTraining from "../components/Admin/Training";



export default {
    components: {
      AppEmployee, AppJobinfo,
      AppEmergencyC,AppImage, 
      // AppImagePrivate,
      AppCompanyAsset,AppTraining,AppLetter
    },
    mounted() {
        this.fetchData();
    }, 

    data(){
      return {
        data: [],        
        canWrite: "",
      }
    },

    methods: {
       fetchData(){
            axios
                .get("/index")
                .then((response) => {
                    this.data = response.data.user;
                    this.canWrite = response.data.canwrite;
                })
                .catch((e) => {
                    this.errors = e.response.data;
                });
        },
    }
}
</script>

<style>

</style>