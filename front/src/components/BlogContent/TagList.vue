<template>
  <div class="holder">
    <div class="list">
      <h4>Most used words here</h4>
      <ul>
        <li v-for="tag in tags" :key="tag">{{ tag }}</li>
      </ul>
    </div>
  </div>
</template>

<script>
  export default {
    name: 'tag-list',
    props: {
      tags: {
        type: Array,
        required: true
      }
    }
  }
</script>

<style scoped>
  .holder {
    width: 100%;
    padding: 20px 20px 20px 0;
  }

  .list {
    border: 1px solid #444;
    border-radius: 10px;
    padding: 20px;
    min-height: 150px;
  }

  .list ul {
    margin-left: 30px;
  }

  @media (max-width: 1024px) {
    .list {
      border: 0;
      min-height: initial;
    }

    .holder {
      padding: 0 20px 0 20px;
      display: inline-block;
      width: 100%;
    }

    .list h4 {
      float: left;
      width: 180px;
      margin-right: -180px;
    }

    .list ul {
      float: left;
      padding-left: 180px;
      width: 100%;
      margin: 0;

    }

    .list h4:after {
      content: ':';
    }

    .list li {
      display: inline;
    }

    .list li:after {
      content: ',';
    }

    .list li:last-child:after {
      content: '';
    }
  }
</style>
