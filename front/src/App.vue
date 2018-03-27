<template>
  <div id="app">
    <header>
      <h1>My Spectacular Blog</h1>
      <p>A totally false statement</p>
    </header>
    <section>
      <edit-form
        @addPost="addPost"
        @updateTags="updateTags"
      ></edit-form>
      <blog-content
        :posts="posts"
        :tags="tags"
        :isLoading="isLoading"
      ></blog-content>
    </section>
  </div>
</template>

<script>
  import EditForm from '@/components/EditForm';
  import BlogContent from '@/components/BlogContent';

  export default {
    name: 'App',
    data() {
      return {
        posts: [],
        tags: [],
        isLoading: true
      }
    },
    components: {
      EditForm,
      BlogContent
    },
    mounted() {
      fetch('/api')
        .then(response => response.json())
        .then((response) => {
          if (response.tags && response.posts) {
            this.posts = response.posts;
            this.tags = response.tags;
            this.isLoading = false;
          } else {
              new Error('Ooops');
          }
        })
        .catch((error) => {
          alert(error || 'Something is going wrong');
        })
    },
    methods: {
      addPost(post) {
        this.posts.unshift(post);
      },
      updateTags(tags) {
        this.tags = tags;
      }
    }

  }
</script>

<style>
  * {
    padding: 0;
    margin: 0;
    font-family: 'Avenir', Helvetica, Arial, sans-serif;
    -webkit-font-smoothing: antialiased;
    -moz-osx-font-smoothing: grayscale;
    box-sizing: border-box;

  }

  body {
    background-color: #F6F6F6;
  }

  #app {
    width: 75%;
    margin: auto;
    background-color: white;
    min-height: 100vh;
    min-width: 640px;

  }

  @media (max-width: 1024px) {
    #app {
      width: 100%;
    }
  }

  section {
    padding: 0 20px;
  }

  header {
    height: 200px;
    text-align: center;
    padding: 30px;
  }

  header p {
    margin-top: 20px;
    font-style: italic;
  }


</style>
