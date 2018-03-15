<template>
  <div class="holder">
    <h3>New Blog Post</h3>
    <div class="form">
      <form action="#" @submit.stop.prevent="sendForm">
        <div class="form-fields">
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
        </div>
        <div class="form-action">
          <button type="submit">Save post</button>
        </div>
      </form>

    </div>
  </div>
</template>

<script>
  import FormFieldHolderVuelidate from '@/components/EditForm/FormFieldHolderVuelidate';
  import {validationMixin} from 'vuelidate';
  import {required, email} from 'vuelidate/lib/validators';
  export default {
    mixins: [validationMixin],
    name: 'edit-form',
    components: {
      FormFieldHolderVuelidate
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
  .holder {
    border: 1px solid #444;
    border-radius: 10px;
    margin: 20px;
    padding: 20px;
  }

  .form {
    margin: 40px 0 40px 0;
    display: inline-block;
    width: 100%;
  }

  .form-action::after {
    clear: both;
  }

  .form-fields {
    float: left;
    width: 75%;
  }

  .form-action {
    float: left;
    width: 25%;
    padding: 0 10px 0 40px;
  }

  .form-action button {
    height: 45px;
    width: 100%;
    background-color: cornflowerblue;
    color: white;
    border: 0;
    border-radius: 3px;
    font-size: larger;
  }

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
