<template>
  <div>
    <post-item></post-item>
    <post-item></post-item>
    <post-item></post-item>
    <post-item></post-item>
    <post-item></post-item>
  </div>
</template>

<script>
  import PostItem from '@/components/PostItem';

  export default {
    name: 'post-item-list',
    components: { PostItem },
  };
</script>
