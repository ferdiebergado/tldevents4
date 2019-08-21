<template>
  <a :class="classes" :href="viewlink" role="button" title="View">
    <i class="fas fa-info-circle"></i>
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
      return `/participants/${this.data.id}`;
    }
  }
};
</script>
