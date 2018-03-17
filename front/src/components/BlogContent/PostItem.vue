<template>
  <article class="holder">
    <div class="time">12:45:05</div>
    <h1>
      I am PostItem with very long title mf I am PostItem with very long title mf I am PostItem with very long title mf</h1>
    <p>
      <img width="100" height="100" src="https://dummyimage.com/300x300/3d113d/5ccca5.png&text=Hi"/>
      Some very interesting text dfsdfsd sdf sd fsdf sdfdsafsf adafdfasdfasdfasdfasfasdfasdfasdfasdfasd

      d'sfs'd;f'sd;f'sd

      ds;afl;'fas '
      fsd'6666666
      f 'dsaf;' afdfsd'f;ds'f;a<br/>
      ds'fas
      df ;ad
      'sfdsfsdfddffdfdddddddddddddddddd dfsd'fd;s'fsd
      sadf'
      a;s'dfasdfdf fdfdfdfd
      asd
      fdsfddddddddddddddddddddddddddddddddds <br/> fdsfddddddddddddddddddddddddddddddddds <br/>
      fdsfddddddddddddddddddddddddddddddddds <br/> fdsfddddddddddddddddddddddddddddddddds <br/>
      fdsfddddddddddddddddddddddddddddddddds <br/> fdsfddddddddddddddddddddddddddddddddds <br/>
      asd
      faasssssssssssssssfdsfsdf
      sd
      fasdfasdfasdf
      asd
      f
      asd
      f
      as
      df
      as
      dfasd444<br/>

    </p>
  </article>
</template>


<script>
  export default {
    name: 'post-item'
  }
</script>

<style scoped>
  .holder {
    border: 1px solid #444;
    border-radius: 10px;
    margin: 20px;
    padding: 10px 20px;
  }

  .holder h1 {
    display: inline-block;
    float: left;
    width: 100%;
    margin-right: 100px;
    padding-right: 100px;
    padding-bottom: 20px;
  }

  .holder .time {
    display: inline-block;
    float: right;
    width: 100px;
    margin-left: -100px;
    text-align: right;
  }

  .holder h1:after {
    clear: both;
  }

  .holder p {
    margin: 40px 0;
    line-height: 16px;
  }

  .holder p img {
    float: left;
    margin: 0 20px 10px 0;
  }

  .holder p:after {
    clear: both;
  }
</style>
