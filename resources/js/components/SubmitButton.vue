<template>
  <button type="submit" class="btn btn-primary" :disabled="disabled" @click="submitForm()">
    <i :class="icon"></i>
    {{ txt }}
  </button>
</template>

<script>
export default {
  props: {
    text: String,
    icon: String
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
