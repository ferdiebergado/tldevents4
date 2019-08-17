<template>
  <!-- <div class="col-12"> -->
  <div class="row py-4">
    <div class="col-12">
      <div class="row mb-3">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
          <div class="btn-toolbar" role="toolbar" aria-label>
            <div class="btn-group" role="group" aria-label>
              <form class="form-inline">
                <div class="form-group">
                  <span>
                    Showing Page {{ meta.current_page }} of {{ meta.last_page }} with a Total of
                    <strong>{{ meta.total }} rows</strong> at &nbsp;
                  </span>
                  <select class="form-control" v-model="perpage" @change="fetchData(route)">
                    <option value="10">10</option>
                    <option value="25">25</option>
                    <option value="50">50</option>
                    <option value="100">100</option>
                  </select>
                  <label class="px-2">Rows Per Page</label>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6">
          <div class="btn-toolbar float-right" role="toolbar" aria-label>
            <div class="btn-group" role="group" aria-label>
              <div class="input-group">
                <input
                  type="text"
                  class="form-control"
                  placeholder="Search"
                  v-model="search"
                  @keyup.enter="firstPage()"
                />
                <div class="input-group-append">
                  <button class="btn btn-light" type="button" @click="fetchData()">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </div>
            </div>
            <div class="btn-group" role="group" aria-label>
              <div class="dropdown open">
                <button
                  class="btn btn-light dropdown-toggle"
                  type="button"
                  data-toggle="dropdown"
                  aria-haspopup="true"
                  aria-expanded="false"
                  title="Export"
                >
                  <i class="fas fa-file-export"></i>
                </button>
                <div class="dropdown-menu">
                  <button class="dropdown-item" href="#">
                    <i class="far fa-file-pdf"></i> PDF
                  </button>
                  <button class="dropdown-item" href="#">
                    <i class="fas fa-file-csv"></i> CSV
                  </button>
                  <button class="dropdown-item" href="#">
                    <i class="far fa-file-excel"></i> Excel
                  </button>
                </div>
              </div>
              <button class="btn btn-light" @click="fetchData(route)" title="Refresh">
                <i class="fas fa-redo-alt"></i>
              </button>
            </div>
            <div class="btn-group" role="group" aria-label>
              <button
                class="btn btn-light"
                @click="firstPage()"
                :disabled="isFirstPage"
                title="First Page"
              >
                <i class="fas fa-angle-double-left"></i>
              </button>
              <button
                class="btn btn-light"
                @click="prevPage()"
                :disabled="isFirstPage"
                title="Previous Page"
              >
                <i class="fas fa-angle-left"></i>
              </button>
              <button
                class="btn btn-light"
                @click="nextPage()"
                :disabled="isLastPage"
                title="Next Page"
              >
                <i class="fas fa-angle-right"></i>
              </button>
              <button
                class="btn btn-light"
                @click="lastPage()"
                :disabled="isLastPage"
                title="Last Page"
              >
                <i class="fas fa-angle-double-right"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
      <table class="table table-bordered table-hover table-responsive">
        <thead class="thead-light">
          <tr>
            <th scope="col">ID</th>
            <th scope="col" v-for="column in columns" :key="column.id" width="20%">{{ column.name }}</th>
            <th scope="col">Action(s)</th>
          </tr>
        </thead>
        <tbody>
          <tr v-if="error">
            <small class="text-danger">{{ error }}</small>
          </tr>
          <template v-if="errors.length > 0">
            <ul class="text-danger">
              <li v-for="(key, value) in errors" :key="key">{{ key }}: {{ value }}</li>
            </ul>
          </template>
          <tr v-show="loading">Loading...</tr>
          <template v-if="data.length > 0">
            <tr v-for="rec in data" :key="rec.id" @click="showRecord(rec.id)">
              <th scope="row">
                <span class="badge badge-secondary">{{ rec.id }}</span>
              </th>
              <td>{{ rec.title }}</td>
              <td>{{ rec.venue }}</td>
              <td>{{ rec.start_date }}</td>
              <td>{{ rec.end_date }}</td>
              <td>
                <a class="btn btn-sm btn-primary" role="button" :href="link+'/'+rec.id+'/edit'">
                  <i class="far fa-edit"></i>
                </a>
              </td>
            </tr>
          </template>
          <tr v-else>No records found.</tr>
        </tbody>
      </table>
    </div>
  </div>
  <!-- </div> -->
</template>

<script>
export default {
  props: {
    route: {
      type: String,
      required: true
    },
    link: {
      type: String,
      required: true
    },
    headers: {
      type: Array,
      required: true
    }
  },
  data() {
    return {
      data: [],
      meta: [],
      page: 1,
      perpage: 10,
      columns: this.headers,
      search: "",
      error: "",
      errors: [],
      loading: false
    };
  },
  computed: {
    isFirstPage: function() {
      return this.meta.current_page === 1;
    },
    isLastPage: function() {
      return this.meta.current_page === this.meta.last_page;
    }
  },
  created() {
    this.fetchData();
  },
  methods: {
    fetchData() {
      this.error = "";
      this.errors = [];
      this.loading = true;
      axios
        .get(this.route, {
          params: {
            per_page: this.perpage,
            page: this.page,
            search: this.search
          }
        })
        .then(res => {
          let response = res.data;
          this.data = response.data;
          this.meta = response.meta;
        })
        .catch(error => {
          if (error.response) {
            // The request was made and the server responded with a status code
            // that falls out of the range of 2xx
            console.log(error.response.data);
            console.log(error.response.status);
            console.log(error.response.headers);
            this.error = error.response.data.message;
            this.errors = error.response.data.errors;
          } else if (error.request) {
            // The request was made but no response was received
            // `error.request` is an instance of XMLHttpRequest in the browser and an instance of
            // http.ClientRequest in node.js
            console.log(error.request);
            this.error = error.request;
          } else {
            // Something happened in setting up the request that triggered an Error
            console.log("Error", error.message);
            this.error = error.message;
            this.errors = error.errors;
          }
          //   console.log(error.config);
        });
      this.loading = false;
    },
    nextPage() {
      this.page++;
      this.fetchData();
    },
    prevPage() {
      this.page--;
      this.fetchData();
    },
    firstPage() {
      this.page = 1;
      this.fetchData();
    },
    lastPage() {
      this.page = this.meta.last_page;
      this.fetchData();
    }
  }
};
</script>
