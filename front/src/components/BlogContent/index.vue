<template>
  <div class="holder">
    <div v-if="!posts.isLoading">
      <div class="tags">
        <tag-list :tags="tags"></tag-list>
      </div>
      <div class="posts">
        <div class="holder">
          <post-item-list :posts="posts.list"></post-item-list>
        </div>
      </div>
    </div>
    <loader v-else></loader>
  </div>
</template>

<script>
  import PostItemList from '@/components/BlogContent/PostItemList';
  import TagList from '@/components/BlogContent/TagList';
  import Loader from '@/components/base/Loader';

  export default {
    name: 'blog-content',
    components: {
      PostItemList,
      TagList,
      Loader,
    },
    data() {
      return {
        posts: {
          list: [],
          isLoading: true
        },
        tags: {
          list: [],
          isLoading: true
        },
      }
    },
    mounted() {
      this.posts.isLoading = true;
      this.tags.isLoading = true;
      fetch('/api')
        .then(response => response.json())
        .then((response) => {
          if (response.tags && response.posts) {
            this.posts = {
              list: response.posts,
              isLoading: false
            };
            this.tags = {
              list: response.tags,
              isLoading: false
            };
          }
        })
        .catch((error) => {
          alert(error || 'Something is going wrong');
        })
    }
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

