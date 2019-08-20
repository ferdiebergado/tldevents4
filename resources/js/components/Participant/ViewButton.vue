<template>
  <a :class="classes" :href="viewlink" role="button" title="View">
    <i class="far fa-eye"></i>
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
