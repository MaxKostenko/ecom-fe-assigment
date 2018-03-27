<template>
  <article class="a-holder">
    <div class="time">{{ post.time }}</div>
    <h1>{{ post.title }}</h1>
    <p>
      <img v-if="post.image!='null'" :src="imageUrl"/>
      {{ post.text }}
    </p>
  </article>
</template>

<script>
  export default {
    name: 'post-item',
    props: {
      post: {
        type: Object,
        required: true
      }
    },
    computed: {
        imageUrl() {
            return `/images/${this.post.image}`;
        }
    }
  }
</script>

<style scoped>
  .a-holder {
    border: 1px solid #444;
    border-radius: 10px;
    margin: 20px 20px 20px 0;
    padding: 10px 20px;
  }

  .a-holder h1 {
    display: inline-block;
    float: left;
    width: 100%;
    padding-right: 100px;
    padding-bottom: 20px;
  }

  .a-holder .time {
    display: inline-block;
    float: right;
    width: 100px;
    margin-left: -100px;
    text-align: right;
  }

  .a-holder h1:after {
    clear: both;
  }

  .a-holder p {
    display: inline-block;
    width: 100%;
    margin: 10px 0;
    line-height: 16px;
  }

  .a-holder p img {
    float: left;
    margin: 0 20px 10px 0;
  }

  .a-holder p:after {
    clear: both;
  }
</style>
