<template>
  <div class="holder">
    <h3>New Blog Post</h3>
    <div class="form">
        <div class="form-fields">
          <slot></slot>
        </div>
        <div class="form-action">
          <slot name="action"></slot>
        </div>
    </div>
  </div>
</template>

<style scoped>
  .holder {
    border: 1px solid #444;
    border-radius: 10px;
    margin: 20px;
    padding: 20px;
  }

  .form {
    margin: 40px 0 40px 0;
    display: inline-block;
    width: 100%;
  }

  .form-action::after {
    clear: both;
  }

  .form-fields {
    float: left;
    width: 75%;
  }

  .form-action {
    float: left;
    width: 25%;
    padding: 0 10px 0 40px;
  }

</style>
