

<template>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <ContentHeader title="Profile" />
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="main-body">
          <div class="row gutters-sm">
            <div class="col-md-4 mb-3">
              <div class="card">
                <div class="card-body">
                  <div
                    class="d-flex flex-column align-items-center text-center"
                  >
                    <img
                      src="https://bootdey.com/img/Content/avatar/avatar6.png"
                      alt="Admin"
                      class="rounded-circle p-1 bg-primary"
                      width="110"
                    />
                    <div class="mt-3">
                      <h4>{{ userData.name }}</h4>
                      <p class="text-secondary mb-1">
                        {{ userData.designation }}
                      </p>
                      <p class="text-muted font-size-sm">
                        {{ userData.dept_name }}
                      </p>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-8" v-if="!isEdit">
              <div class="card mb-2 p-4 position-relative">
                <div
                  class="position-absolute d-flex"
                  style="right: 20px; top: 15px"
                >
                  <i
                    class="fas fa-edit fa-lg cursor-pointer"
                    @click="changeDivStatus('edit')"
                  ></i>
                </div>
                <div class="card-body">
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{ userData.name }}
                    </div>
                  </div>
                  <hr />
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{ userData.email }}
                    </div>
                  </div>
                  <hr />
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{ userData.phone }}
                    </div>
                  </div>
                  <hr />
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Manager</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{ userData.manager }}
                    </div>
                  </div>
                  <hr />
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{ userData.address }}
                    </div>
                  </div>
                  <hr />
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Facebook</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{ userData.facebook }}
                    </div>
                  </div>
                  <hr />
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Github</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{ userData.github }}
                    </div>
                  </div>
                  <hr />
                  <div class="row">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Linkedin</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      {{ userData.linkedin }}
                    </div>
                  </div>
                  <hr />
                </div>
              </div>
            </div>
            <div class="col-lg-8" v-else>
              <div class="card p-4 position-relative">
                <div
                  class="position-absolute d-flex"
                  style="right: 20px; top: 15px; gap: 10px"
                >
                  <i
                    class="fas fa-save text-success fa-lg cursor-pointer"
                    @click="handleForm()"
                  ></i>
                  <i
                    class="fas fa-window-close text-danger fa-lg cursor-pointer"
                    @click="changeDivStatus('close')"
                  ></i>
                </div>
                <div class="card-body">
                  <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Full Name</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input
                        type="text"
                        class="form-control"
                        v-model="formData.name"
                      />
                    </div>
                  </div>

                  <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Email</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input
                        type="text"
                        class="form-control"
                        v-model="formData.email"
                      />
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Phone</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input
                        type="text"
                        class="form-control"
                        v-model="formData.phone"
                      />
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Manager</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input
                        type="text"
                        class="form-control"
                        :value="userData.manager"
                        disabled
                      />
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Address</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input
                        type="text"
                        class="form-control"
                        v-model="formData.address"
                      />
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Facebook</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input
                        type="text"
                        class="form-control"
                        v-model="formData.facebook"
                      />
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Github</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input
                        type="text"
                        class="form-control"
                        v-model="formData.github"
                      />
                    </div>
                  </div>
                  <div class="row mb-3">
                    <div class="col-sm-3">
                      <h6 class="mb-0">Linkedin</h6>
                    </div>
                    <div class="col-sm-9 text-secondary">
                      <input
                        type="text"
                        class="form-control"
                        v-model="formData.linkedin"
                      />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <!-- /.modal -->
</template>
<script>
import axios from "axios";
import ContentHeader from "../Components/ContentHeader.vue";

export default {
  data() {
    return {
      userData: {},
      formData: {},
      isEdit: false,
    };
  },
  methods: {
    async handleForm() {
      await axios
        .put("/api/update-user/" + this.userData.id, this.formData)
        .then((response) => {
          console.log(response);
          if (response.data.success) {
            localStorage["loggedInUserEmail"] = this.formData.email;
            toastr.success("Data updated successfully");
            this.isEdit = false;
            this.getUserDetails();
          } else {
            toastr.error(response.data.message);
          }
        })
        .catch((error) => {
          console.log(error);
        });
    },
    async getUserDetails() {
      let data = {
        email: localStorage.getItem("loggedInUserEmail"),
      };

      await axios
        .post("/api/user-details", data)
        .then((response) => {
          if (response.data.success) {
            this.userData = response.data.data;
            this.formData.name = response.data.data.name;
            this.formData.email = response.data.data.email;
            this.formData.phone = response.data.data.phone;
            this.formData.address = response.data.data.address;
            this.formData.website = response.data.data.website;
            this.formData.github = response.data.data.github;
            this.formData.twitter = response.data.data.twitter;
            this.formData.linkedin = response.data.data.linkedin;
            this.formData.facebook = response.data.data.facebook;
          }
        })
        .catch((error) => {
          console.log(error);
        });
    },
    changeDivStatus(status) {
      if (status == "edit") {
        this.isEdit = true;
      } else if (status == "close") {
        this.isEdit = false;
      }
    },
  },
  async mounted() {
    await this.getUserDetails();
  },
  components: { ContentHeader },
};
</script>
<style scoped>
.main-body {
  padding: 15px;
}
.card {
  box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06);
}

.card {
  position: relative;
  display: flex;
  flex-direction: column;
  min-width: 0;
  word-wrap: break-word;
  background-color: #fff;
  background-clip: border-box;
  border: 0 solid rgba(0, 0, 0, 0.125);
  border-radius: 0.25rem;
}

.card-body {
  flex: 1 1 auto;
  min-height: 1px;
  padding: 1rem;
}

.gutters-sm {
  margin-right: -8px;
  margin-left: -8px;
}

.gutters-sm > .col,
.gutters-sm > [class*="col-"] {
  padding-right: 8px;
  padding-left: 8px;
}
.mb-3,
.my-3 {
  margin-bottom: 1rem !important;
}

.bg-gray-300 {
  background-color: #e2e8f0;
}
.h-100 {
  height: 100% !important;
}
.shadow-none {
  box-shadow: none !important;
}
</style>