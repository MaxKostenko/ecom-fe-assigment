<template functional>
  <div class="loading-cover">
    <div class="loading-text">
      Loading
      <div class="loader">
        <span>.</span>
        <span>.</span>
        <span>.</span>
      </div>
    </div>
  </div>
</template>

<style scoped>

  .loading-text {
    font-size: x-large;
    text-align: center;
    position: absolute;
    width: 100%;
    top: 45%;
  }

  .loader {
    position: relative;
    display: inline-block;
  }

  .loader span {
    display: inline-block;
    position: absolute;
    font-size: 26px;
    top: -24px;
    animation-duration: 1s;
    animation-iteration-count: infinite;
    animation-direction: alternate;
    animation-timing-function: linear;
  }

  .loader span:nth-child(1) {
    animation-name: dot1;
  }

  .loader span:nth-child(2) {
    animation-name: dot2;
    padding-left: 8px;
  }

  .loader span:nth-child(3) {
    animation-name: dot3;
    padding-left: 16px;
  }

  @keyframes dot1 {
    0%,
    66% {
      left: 0;
    }
    100% {
      left: 15px;
    }
  }

  @keyframes dot2 {
    0%,
    33% {
      left: 0;
    }
    66%,
    100% {
      left: 15px;
    }
  }

  @keyframes dot3 {
    0% {
      left: 0;
    }
    33%,
    100% {
      left: 15px;
    }
  }
</style>
