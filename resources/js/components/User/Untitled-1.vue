<transition name="fade">
    <div class="flex float-right lg:px-2">
      <a
        @click.prevent="getPdf()"
        class="items-center mb-1 cursor-pointer space-x-2 px-3 py-2 border border-green-400 rounded-md bg-green-500 text-white text-xs leading-4 font-medium uppercase tracking-wider focus:outline-none hover:bg-blue-700"
      >
        Export Pdf
      </a>
    </div>

      <div class="max-w-5xl mx-auto mb-3">
        <section class="w-full">
          <div class="bg-white shadow-md px-2 py-2">
            <section class="p-2 w-full mt-2">
              <div id="pdfDom">
                <div class="flex justify-center mb-4">
                  <h3 class="mt-4 font-bold text-xl">
                    {{ form.employees.salutation }}:
                    {{ form.name }}
                  </h3>
                </div>

                <div class="rounded border py-3 px-3">
                  <div class="text-center mb-3">
                    <h3 class="text-green-500 font-bold text-xl">
                      Personal Information.
                    </h3>
                  </div>

                  <div
                    class="flex justify-between mt-2 border rounded-md shadow-md px-3 py-2"
                  >
                    <div>
                      <label class="text-blue-500 font-bold"
                        >Street Address</label
                      >
                      <p class="form-control-static">
                        {{ form.employees.street }}
                      </p>
                    </div>
                    <div>
                      <label class="text-blue-500 font-bold"
                        >Apartment/Unit</label
                      >
                      <p class="form-control-static">
                        {{ form.employees.apartment }}
                      </p>
                    </div>
                    <div>
                      <label class="text-blue-500 font-bold">City</label>
                      <p class="form-control-static">
                        {{ form.employees.city }}
                      </p>
                    </div>
                    <div>
                      <label class="text-blue-500 font-bold">State</label>
                      <p class="form-control-static">
                        {{ form.employees.state }}
                      </p>
                    </div>
                    <div>
                      <label class="text-blue-500 font-bold">Postal Code</label>
                      <p class="form-control-static">
                        {{ form.employees.Zcode }}
                      </p>
                    </div>
                  </div>

                  <div
                    class="flex justify-between mt-2 border rounded-md shadow-md px-3 py-2"
                  >
                    <div>
                      <label class="text-blue-500 font-bold">Home Phone</label>
                      <p class="form-control-static">
                        {{ form.employees.Hphone }}
                      </p>
                    </div>
                    <div>
                      <label class="text-blue-500 font-bold"
                        >Alternate Phone</label
                      >
                      <p class="form-control-static">
                        {{ form.employees.Aphone }}
                      </p>
                    </div>
                    <div>
                      <label class="text-blue-500 font-bold"
                        >Personal Email Address</label
                      >
                      <p class="form-control-static">
                        {{ form.employees.Pemail }}
                      </p>
                    </div>
                    <div>
                      <label class="text-blue-500 font-bold"
                        >National ID
                      </label>
                      <p class="form-control-static">
                        {{ form.employees.nationalId }}
                      </p>
                    </div>
                    <div>
                      <label class="text-blue-500 font-bold"
                        >Tax Pin Number</label
                      >
                      <p class="form-control-static">
                        {{ form.employees.Krapin }}
                      </p>
                    </div>
                  </div>

                  <div
                    class="flex justify-between mt-2 border rounded-md shadow-md px-3 py-2"
                  >
                    <div>
                      <label class="text-blue-500 font-bold">NSSF number</label>
                      <p class="form-control-static">
                        {{ form.employees.nssf }}
                      </p>
                    </div>
                    <div>
                      <label class="text-blue-500 font-bold">NHIF Number</label>
                      <p class="form-control-static">
                        {{ form.employees.nhif }}
                      </p>
                    </div>
                    <div>
                      <label class="text-blue-500 font-bold">Birth Date</label>
                      <datepicker v-model="form.employees.dob"></datepicker>
                    </div>
                    <div>
                      <label class="text-blue-500 font-bold"
                        >Marital Status
                      </label>
                      <p class="form-control-static">
                        {{ form.employees.status }}
                      </p>
                    </div>
                  </div>

                  <div
                    class="flex justify-between mt-2 border rounded-md shadow-md px-3 py-2"
                    v-if="form.employees.status == 'married'"
                  >
                    <div>
                      <label class="text-blue-500 font-bold"
                        >Spouse’s Name</label
                      >
                      <p class="form-control-static">
                        {{ form.employees.spouseN }}
                      </p>
                    </div>
                    <div>
                      <label class="text-blue-500 font-bold"
                        >Spouse’s Employer</label
                      >
                      <p class="form-control-static">
                        {{ form.employees.spouseE }}
                      </p>
                    </div>
                    <div>
                      <label class="text-blue-500 font-bold"
                        >Spouse’s Work Phone</label
                      >
                      <datepicker
                        v-model="form.employees.spousePhone"
                      ></datepicker>
                    </div>
                  </div>

                  <div
                    class="flex justify-between mt-2 border rounded-md shadow-md px-3 py-2"
                  >
                    <div>
                      <label class="text-blue-500 font-bold">Bank Name</label>
                      <p class="form-control-static">
                        {{ form.employees.Bankname }}
                      </p>
                    </div>
                    <div>
                      <label class="text-blue-500 font-bold"
                        >Account Number</label
                      >
                      <p class="form-control-static">
                        {{ form.employees.AccNo }}
                      </p>
                    </div>
                    <div>
                      <label class="text-blue-500 font-bold">Branch Name</label>
                      <p class="form-control-static">
                        {{ form.employees.Branchname }}
                      </p>
                    </div>
                    <div>
                      <label class="text-blue-500 font-bold"
                        >Branch Code
                      </label>
                      <p class="form-control-static">
                        {{ form.employees.Branchcode }}
                      </p>
                    </div>
                  </div>
                </div>

                <div class="rounded border mt-3 py-3 px-3">
                  <div class="text-center mb-3">
                    <h3 class="text-green-500 font-bold text-xl">
                      Job Information.
                    </h3>
                  </div>

                  <div
                    class="flex justify-between mt-2 border rounded-md shadow-md px-3 py-2"
                  >
                    <div>
                      <label class="text-blue-500 font-bold">Job Title</label>
                      <p class="form-control-static">
                        {{ form.job_infos.title }}
                      </p>
                    </div>
                    <div>
                      <label class="text-blue-500 font-bold">Employee ID</label>
                      <p class="form-control-static">
                        {{ form.job_infos.EmployeeId }}
                      </p>
                    </div>
                    <div>
                      <label class="text-blue-500 font-bold">Supervisor</label>
                      <p class="form-control-static">
                        {{ form.job_infos.supervisor }}
                      </p>
                    </div>
                    <div>
                      <label class="text-blue-500 font-bold">Department</label>
                      <p class="form-control-static">
                        {{ form.job_infos.department }}
                      </p>
                    </div>
                    <div>
                      <label class="text-blue-500 font-bold"
                        >Work Location</label
                      >
                      <p class="form-control-static">
                        {{ form.job_infos.Wlocation }}
                      </p>
                    </div>
                  </div>

                  <div
                    class="flex justify-between mt-2 border rounded-md shadow-md px-3 py-2"
                  >
                    <div>
                      <label class="text-blue-500 font-bold"
                        >Job E-mail Address</label
                      >
                      <p class="form-control-static">
                        {{ form.job_infos.Wemail }}
                      </p>
                    </div>
                    <div>
                      <label class="text-blue-500 font-bold">Work Phone</label>
                      <p class="form-control-static">
                        {{ form.job_infos.Wphone }}
                      </p>
                    </div>
                    <div>
                      <label class="text-blue-500 font-bold">Cell Phone</label>
                      <p class="form-control-static">
                        {{ form.job_infos.Cphone }}
                      </p>
                    </div>
                    <div>
                      <label class="text-blue-500 font-bold">Start Date</label>
                      <p class="form-control-static">
                        <datepicker
                          v-model="form.job_infos.Sdate"
                        ></datepicker>
                      </p>
                    </div>
                  </div>
                </div>

                <div class="rounded border mt-3 py-3 px-3">
                  <div class="text-center mb-3">
                    <h3 class="text-green-500 font-bold text-xl">
                      Emergency Contact Information.
                    </h3>
                  </div>

                  <div
                    class="flex justify-between mt-2 border rounded-md shadow-md px-3 py-2"
                  >
                    <div>
                      <label class="text-blue-500 font-bold">Full Names</label>
                      <p class="form-control-static">
                        {{ form.emergency.Fname }}
                      </p>
                    </div>
                    <div>
                      <label class="text-blue-500 font-bold"
                        >Street Address</label
                      >
                      <p class="form-control-static">
                        {{ form.emergency.street }}
                      </p>
                    </div>
                    <div>
                      <label class="text-blue-500 font-bold"
                        >Apartment/Unit</label
                      >
                      <p class="form-control-static">
                        {{ form.emergency.apartment }}
                      </p>
                    </div>
                    <div>
                      <label class="text-blue-500 font-bold">City</label>
                      <p class="form-control-static">
                        {{ form.emergency.city }}
                      </p>
                    </div>
                    <div>
                      <label class="text-blue-500 font-bold">State</label>
                      <p class="form-control-static">
                        {{ form.emergency.state }}
                      </p>
                    </div>
                  </div>

                  <div
                    class="flex justify-between mt-2 border rounded-md shadow-md px-3 py-2"
                  >
                    <div>
                      <label class="text-blue-500 font-bold">Postal Code</label>
                      <p class="form-control-static">
                        {{ form.emergency.Zcode }}
                      </p>
                    </div>
                    <div>
                      <label class="text-blue-500 font-bold"
                        >Primary Phone</label
                      >
                      <p class="form-control-static">
                        {{ form.emergency.Pphone }}
                      </p>
                    </div>
                    <div>
                      <label class="text-blue-500 font-bold"
                        >Alternate Phone</label
                      >
                      <p class="form-control-static">
                        {{ form.emergency.Aphone }}
                      </p>
                    </div>
                    <div>
                      <label class="text-blue-500 font-bold"
                        >Relationship</label
                      >
                      <p class="form-control-static">
                        {{ form.emergency.relationship }}
                      </p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="rounded border mt-3 py-3 px-3">
                <div class="text-center mb-3">
                  <h3 class="text-green-500 font-bold text-xl">Documents.</h3>
                </div>

                <div
                  class="flex justify-center mt-2 border rounded-md shadow-md px-3 py-2"
                >
                  <table>
                      <tbody v-for="doc in form.Images" :key="doc.id">
                        <tr class="hover:bg-grey-lighter">
                          <td>
                            <div
                              class="border rounded-md shadow-md p-2 flex mr-2"
                            >
                              <p class="font-semibold text-blue-600 mr-2">
                                Document Name:
                              </p>
                              {{ doc.file }}
                            </div>
                          </td>
                          <td>
                            <div class="border rounded-md shadow-md p-2 mr-2">
                              <a
                                @click.prevent="view(doc)"
                                class="cursor-pointer items-center px-3 py-2 bg-blue-500 border rounded-md text-xs text-white hover:bg-blue-800 focus:outline-none focus:ring ring-gray-300 transition ease-in-out duration-150"
                                >Open</a
                              >
                            </div>
                          </td>
                        </tr>
                      </tbody>
                  </table>
                </div>
              </div>
            </section>
            <!-- footer -->
          </div>
        </section>
      </div>
</transition>