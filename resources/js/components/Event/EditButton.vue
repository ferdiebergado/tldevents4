<template>
  <a :class="classes" :href="editlink" role="button" title="Edit">
    <i class="far fa-edit"></i>
  </a>
</template>

<script>
export default {
  props: {
    data: {},
    classes: {}
  },
  computed: {
    editlink: function() {
      return `/events/${this.data.id}/edit`;
    }
  }
};
</script>
