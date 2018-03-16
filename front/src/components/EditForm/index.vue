<template>
  <form action="#" @submit.stop.prevent="sendForm">
    <edit-form-layer>
      <form-button type="submit" slot="action">Send Form</form-button>
      <template slot="fields">
        <form-field-holder-vuelidate
            :validator="$v.title"
        >
          <input
              v-model="title"
              type="text"
              placeholder="Input Title"
          />
        </form-field-holder-vuelidate>

        <form-field-holder-vuelidate
            :validator="$v.text"
        >
          <textarea
              v-model="text"
              placeholder="Input text"
          ></textarea>
        </form-field-holder-vuelidate>

        <form-field-holder-vuelidate
            :validator="$v.author"
        >
          <input
              v-model="author"
              type="text"
              placeholder="Input author Email"
          />
        </form-field-holder-vuelidate>
        <file-upload-field></file-upload-field>
      </template>
    </edit-form-layer>

  </form>
</template>

<script>
  import FormFieldHolderVuelidate from '@/components/EditForm/FormFieldHolderVuelidate';
  import FormButton from '@/components/EditForm/FormButton';
  import FileUploadField from '@/components/EditForm/FileUploadField';
  import EditFormLayer from '@/components/EditForm/EditFormLayer';
  import {validationMixin} from 'vuelidate';
  import {required, email} from 'vuelidate/lib/validators';
  export default {
    mixins: [validationMixin],
    name: 'edit-form',
    components: {
      FormFieldHolderVuelidate,
      FormButton,
      EditFormLayer,
      FileUploadField,
    },
    data() {
      return {
        title: '',
        text: '',
        author: ''
      }
    },
    validations: {
      title: {
        required,
      },
      text: {
        required,
      },
      author: {
        required,
        email,
      }
    },
    methods: {
      sendForm() {
        this.$v.$touch();
      }
    }

  };
</script>

<style scoped>
  input, textarea {
    border: 1px solid #676767;
    height: 35px;
    padding: 5px;
    width: 100%;
  }

  textarea {
    height: 150px;
    resize: none;
  }
</style>
