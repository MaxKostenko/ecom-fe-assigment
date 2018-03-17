<template>
  <div class="holder">
    <div class="link-holder">
      <template v-if="filename">
        {{ filename }}
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
    data() {
      return {
        filename: null
      };
    },
    methods: {
      fileSelected(e) {
        const files = e.target.files;
        if(files && files.length) {
          this.filename = files[0].name;
          this.$emit('input', files[0]);
        }
      },
      openFileDialog(e) {
        this.$refs.field.click();
      },
      resetInput(e) {
        this.$refs.field.value = null;
        this.filename = null;
      }
    },
    computed: {
      uploadButtonText() {
        return this.filename ? 'Change Image' : 'Upload Image';
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
