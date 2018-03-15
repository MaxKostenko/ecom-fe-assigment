<template>
  <form action="#" @submit.stop.prevent="sendForm">
    <edit-form-layer>
      <submit-button slot="action"></submit-button>
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
    </edit-form-layer>

  </form>
</template>

<script>
  import FormFieldHolderVuelidate from '@/components/EditForm/FormFieldHolderVuelidate';
  import SubmitButton from '@/components/EditForm/SubmitButton';
  import EditFormLayer from '@/components/EditForm/EditFormLayer';
  import {validationMixin} from 'vuelidate';
  import {required, email} from 'vuelidate/lib/validators';
  export default {
    mixins: [validationMixin],
    name: 'edit-form',
    components: {
      FormFieldHolderVuelidate,
      SubmitButton,
      EditFormLayer
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
