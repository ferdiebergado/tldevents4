<template>
  <data-table :url="route" :classes="classes" :per-page="perPage" :columns="columns"></data-table>
</template>
<script>
import ViewButton from "./ViewButton.vue";
export default {
  props: {
    route: {
      type: String,
      required: true
    }
  },
  data() {
    return {
      classes: {
        "table-container": {
          "table-responsive": true
        },
        table: {
          table: true,
          "table-dark": false,
          "table-striped": true,
          "table-sm": true
        },
        "t-head": {
          "thead-dark": true
        },
        "t-head-tr": {
          "text-center": true
        },
        td: {
          "text-center": true
        }
      },
      perPage: ["10", "25", "50", "100"],
      columns: [
        {
          label: "ID",
          name: "id",
          filterable: true,
          width: 8
        },
        {
          label: "Title",
          name: "title",
          filterable: true
        },
        {
          label: "Venue",
          name: "venue",
          filterable: true
        },
        {
          label: "Start Date",
          width: 12,
          name: "start_date",
          filterable: true
        },
        {
          label: "End Date",
          name: "end_date",
          filterable: true,
          width: 12
        },
        {
          label: "Action(s)",
          component: ViewButton,
          classes: {
            btn: true,
            "btn-sm": true,
            "btn-primary": true
          },
          meta: {
            route: this.route
          },
          filterable: false
        }
      ]
    };
  },
  components: {
    ViewButton
  }
};
</script>
