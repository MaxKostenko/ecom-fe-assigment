<template>
  <button :type="type" class="button">
    <slot></slot>
  </button>
</template>

<script>
  export default {
    props: {
      type: {
        type: String,
        require: true,
        default: 'button'
      }
    }
  }
</script>

<style>
  .button {
    height: 45px;
    width: 100%;
    max-width: 250px;
    background-color: cornflowerblue;
    color: white;
    border: 0;
    border-radius: 3px;
    font-size: larger;
  }
</style>
