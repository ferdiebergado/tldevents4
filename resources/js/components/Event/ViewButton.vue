<template>
  <a :class="classes" :href="viewlink" role="button" title="View">
    <i class="fas fa-tasks"></i>
  </a>
</template>

<script>
export default {
  props: {
    data: {},
    classes: {}
  },
  computed: {
    viewlink: function() {
      return `/events/${this.data.id}`;
    }
  }
};
</script>
