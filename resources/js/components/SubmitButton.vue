<template>
  <button type="submit" class="btn btn-primary" :disabled="disabled" @click="submitForm()">{{ txt }}</button>
</template>

<script>
export default {
  props: {
    text: String
  },
  data() {
    return {
      disabled: false,
      txt: this.text
    };
  },
  methods: {
    submitForm() {
      this.disabled = true;
      this.txt = "Saving...";
      document.getElementById("modelform").submit();
    }
  }
};
</script>
