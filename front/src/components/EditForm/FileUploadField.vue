<template>
  <div class="holder">
    <div class="link-holder">
      <template v-if="value">
        {{ value.name }}
        <a href="#" @click.stop.prevent="resetInput">(x remove image)</a>
      </template>
      <span v-else @click="openFileDialog">Please select file</span>

    </div>
    <div class="button-holder" >
      <form-button type="button" @click.native="openFileDialog">{{uploadButtonText}}</form-button>
    </div>
    <input ref="field" class="upload-field" @change="fileSelected" type="file"/>
  </div>
</template>

<script>
  import FormButton from '@/components/base/FormButton';

  export default {
    name: 'file-upload-field',
    components: {
      FormButton
    },
    props: {
        value: {
          type: File
        }
    },
    updated() {
      if(!this.value) {
        this.resetInput();
      }
    },
    methods: {
      fileSelected(e) {
        const files = e.target.files;
        if(files.length) {
          this.$emit('input', files[0]);
        }
      },
      openFileDialog(e) {
        this.$refs.field.click();
      },
      resetInput() {
        this.$refs.field.value = null;
        this.$emit('input', null);
      }
    },
    computed: {
      uploadButtonText() {
        return this.value ? 'Change Image' : 'Choose Image';
      }
    }

  }
</script>

<style scoped>
  .holder {
    display: inline-block;
    width: 100%;
    margin-bottom: 20px;
  }

  .upload-field {
    display: none;
  }

  .link-holder {
    float: left;
    width: 100%;
    padding-right: 180px;

  }

  .button-holder {
    float: left;
    width: 150px;
    margin-left: -150px;
  }

  .button-holder:after {
    clear: both;
  }

</style>
