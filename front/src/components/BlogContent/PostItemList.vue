<template>
  <div class="holder">
    <post-item></post-item>
    <post-item></post-item>
    <post-item></post-item>
    <post-item></post-item>
    <post-item></post-item>
  </div>
</template>

<script>
  import PostItem from '@/components/BlogContent/PostItem';

  export default {
    name: 'post-item-list',
    components: {PostItem},
  };
</script>

<style scoped>
  .holder {

  }
</style>
