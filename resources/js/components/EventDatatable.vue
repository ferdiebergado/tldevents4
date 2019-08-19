<template>
  <data-table :url="route" :per-page="perPage" :columns="columns"></data-table>
</template>
<script>
export default {
  props: {
    route: {
      type: String,
      required: true
    }
  },
  data() {
    return {
      perPage: ["10", "25", "50", "100"],
      columns: [
        {
          label: "ID",
          name: "id",
          filterable: true
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
          name: "start_date",
          filterable: true
        },
        {
          label: "End Date",
          name: "end_date",
          filterable: true
        }
      ]
    };
  }
};
</script>
