<template>
  <div class="form-group">
    <label for="name">{{ name }}</label>
    <select class="form-control" name="name" id="name">
      <option value>Select region...</option>
      <option v-for="region in regions" :key="region.id" :value="region.id">{{ region.name }}</option>
    </select>
  </div>
</template>

<script>
import axios from "axios";
export default {
  props: {
    name: "",
    route: "",
    perpage: null,
    change: () => {}
  },
  data() {
    return {
      region: "",
      regions: {}
    };
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
    }
  }
};
</script>
