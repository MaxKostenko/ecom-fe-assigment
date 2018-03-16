<template>
  <div class="holder">
    <div class="tags">
      <tag-list></tag-list>
    </div>
    <div class="posts">
      <post-item-list></post-item-list>
    </div>
  </div>
</template>

<script>
  import PostItemList from '@/components/BlogContent/PostItemList';
  import TagList from '@/components/BlogContent/TagList';

  export default {
    name: 'blog-content',
    components: {
      PostItemList,
      TagList,
    },
  };
</script>

<style scoped>
  .holder {
    display: inline-block;
    width: 100%;
  }
  .holder::after {
    clear: both;
  }
  .tags {
    float: right;
    width: 25%;
  }
  .posts {
    float: left;
    width: 75%;
  }

  @media (max-width: 1024px) {
    .tags {
      width: 100%;
    }
    .posts {
      width: 100%;
    }
  }

</style>

