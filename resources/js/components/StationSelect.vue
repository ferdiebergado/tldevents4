<template>
  <div class="form-row">
    <div class="col-6">
      <div class="form-group">
        <label for="region">Region</label>
        <select
          class="form-control"
          name="region"
          id="region"
          v-model="region"
          @change="updateDivisions()"
        >
          <option value>Select region...</option>
          <template v-if="regions">
            <option v-for="reg in regions" :key="reg.id" :value="reg.id">{{ reg.name }}</option>
          </template>
        </select>
      </div>
    </div>
    <div class="col-6">
      <div class="form-group">
        <label for="division">Division</label>
        <select class="form-control" name="division" id="division" :disabled="disabled">
          <option value>Select division...</option>
          <template v-if="divisions">
            <option
              v-for="division in divisions"
              :key="division.id"
              :value="division.id"
            >{{ division.name }}</option>
          </template>
        </select>
      </div>
    </div>
  </div>
</template>
<script>
import axios from "axios";
export default {
  props: {
    route: "",
    divroute: "",
    perpage: null
  },
  data() {
    return {
      region: "",
      regions: {},
      divisions: {}
    };
  },
  computed: {
    disabled() {
      return this.divisions.length === 0;
    }
  },
  created() {
    this.fetchData();
  },
  methods: {
    fetchData() {
      axios
        .get(this.route, {
          params: {
            length: this.perpage || 10,
            active: true,
            draw: 1
          }
        })
        .then(res => {
          this.regions = res.data.data;
        })
        .catch(e => {
          console.log(e.response.data);
        });
    },
    updateDivisions() {
      axios
        .get(this.divroute, {
          params: {
            length: this.perpage || 10,
            region: this.region,
            draw: 1
          }
        })
        .then(res => {
          this.divisions = res.data.data;
        })
        .catch(e => {
          console.log(e.response.data);
        });
    }
  }
};
</script>
