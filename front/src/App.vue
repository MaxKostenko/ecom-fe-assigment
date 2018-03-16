<template>
  <div id="app">
    <header>
      <h1>My Spectacular Blog</h1>
      <p>A totally false statement</p>
    </header>
    <section>
      <edit-form></edit-form>
      <blog-content></blog-content>
    </section>
  </div>
</template>

<script>
import EditForm from '@/components/EditForm';
import BlogContent from '@/components/BlogContent';

export default {
  name: 'App',
  components: {
    EditForm,
    BlogContent
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
