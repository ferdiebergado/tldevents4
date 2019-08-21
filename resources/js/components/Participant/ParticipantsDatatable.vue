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
          label: "Last Name",
          name: "lastname",
          filterable: true
        },
        {
          label: "First Name",
          name: "firstname",
          filterable: true
        },
        {
          label: "MI",
          name: "mi",
          filterable: true
        },
        {
          label: "Sex",
          name: "sex",
          filterable: true
        },
        {
          label: "Mobile",
          name: "mobile",
          filterable: true
        },
        {
          label: "Email",
          name: "email",
          filterable: true
        },
        {
          label: "Events",
          name: "events_count",
          filterable: true,
          classes: {
            badge: true,
            "badge-primary": true
          }
        },
        {
          label: "Last Attended",
          name: "last_attended",
          filterable: true
        },
        {
          label: "Task(s)",
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
