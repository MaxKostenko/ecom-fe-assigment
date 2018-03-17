<template functional>
  <div :class="{ 'holder': true, 'hasError': props.error }">
    <div class="field-holder">
      <slot></slot>
    </div>
    <div class="error">{{ props.error }}</div>
  </div>
</template>

<script>
  export default {
    name: 'form-field-holder',
    props: {
      error: {
        type: String,
        default: '',
      },
    },
  };
</script>

<style scoped>
  .error {
    display: inline-block;
    color: red;
    height: 14px;
    font-size: smaller;
  }

  .holder {
    margin-bottom: 5px;
  }
</style>
