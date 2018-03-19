<template>
  <div class="holder">
    <div v-if="!isLoading">
      <div class="tags">
        <tag-list :tags="tags"></tag-list>
      </div>
      <div class="posts">
        <div class="holder">
          <post-item
            v-for="post in posts"
            :post="post"
            :key="post.time"
          ></post-item>
        </div>
      </div>
    </div>
    <loader v-else></loader>
  </div>
</template>

<script>
  import PostItem from '@/components/BlogContent/PostItem';
  import TagList from '@/components/BlogContent/TagList';
  import Loader from '@/components/base/Loader';

  export default {
    name: 'blog-content',
    components: {
      PostItem,
      TagList,
      Loader,
    },
    props: {
      tags: {
        type: Array,
        required: true,
      },
      posts: {
        type: Array,
        required: true,
      },
      isLoading: {
        type: Boolean,
        required: true,
      },
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

