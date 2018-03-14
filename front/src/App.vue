<template>
  <div id="app">
    <edit-form></edit-form>
    <tag-list></tag-list>
    <post-item-list></post-item-list>
  </div>
</template>

<script>
import EditForm from './components/EditForm';
import PostItemList from './components/PostItemList';
import TagList from './components/TagList';

export default {
  name: 'App',
  components: {
    EditForm,
    PostItemList,
    TagList,
  }
}
</script>

<style>
#app * {
  font-family: 'Avenir', Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
}
</style>
