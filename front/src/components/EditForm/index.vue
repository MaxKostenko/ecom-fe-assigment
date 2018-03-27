<template>
  <block-loader :isLoading="isLoading">
    <form action="#" @submit.stop.prevent="sendForm">
      <edit-form-layer>
        <form-button type="submit" slot="action">Send Form</form-button>
        <template slot="fields">
          <form-field-holder-vuelidate
            :validator="$v.form.title"
          >
            <input
              v-model="form.title"
              type="text"
              placeholder="Input Title"
            />
          </form-field-holder-vuelidate>

          <form-field-holder-vuelidate
            :validator="$v.form.text"
          >
          <textarea
            v-model="form.text"
            placeholder="Input text"
          ></textarea>
          </form-field-holder-vuelidate>

          <form-field-holder-vuelidate
            :validator="$v.form.author"
          >
            <input
              v-model="form.author"
              type="text"
              placeholder="Input author Email"
            />
            <small>Only 'admin@fake-blog.com' and 'fake-user@fake-blog.com' are allowed</small>
          </form-field-holder-vuelidate>
          <file-upload-field
            v-model="form.image"
          ></file-upload-field>
        </template>
      </edit-form-layer>
    </form>
  </block-loader>
</template>

<script>
  import FormFieldHolderVuelidate from '@/components/EditForm/FormFieldHolderVuelidate';
  import FormButton from '@/components/base/FormButton';
  import BlockLoader from '@/components/base/BlockLoader';
  import FileUploadField from '@/components/EditForm/FileUploadField';
  import EditFormLayer from '@/components/EditForm/EditFormLayer';
  import {validationMixin} from 'vuelidate';
  import {required, email} from 'vuelidate/lib/validators';
  import {withParams} from 'vuelidate/lib/validators/common';
  import SendForm from '@/components/base/SendForm';

  export default {
    mixins: [validationMixin],
    name: 'edit-form',
    components: {
      FormFieldHolderVuelidate,
      FormButton,
      EditFormLayer,
      FileUploadField,
      BlockLoader,
    },
    data() {
      return {
        form: {
          title: '',
          text: '',
          author: '',
          image: null
        },
        serverCheckErrors: {
          author: ''
        },
        isLoading: false
      }
    },
    validations() {
      return {
        form: {
          title: {
            required,
          },
          text: {
            required,
          },
          author: {
            required,
            email,
            serverCheck: withParams(
              {serverCheckErrorText: this.serverCheckErrors.author},
              value => !this.serverCheckErrors.author
            )
          }
        }
      }
    },
    methods: {
      sendForm() {
        this.serverCheckErrors.author = '';
        this.$v.form.$touch();
        if (!this.$v.form.$invalid) {

          this.isLoading = true;

          SendForm('/api', {...this.form})
            .then(response => JSON.parse(response))
            .then((response) => {

              this.isLoading = false;

              if (response.success) {
                this.$emit('addPost', response.post);
                this.$emit('updateTags', response.tags);
                this.reset();
                this.$v.form.$reset();
              } else {
                this.serverCheckErrors = response.errors;
              }
            });
        }
      },
      reset() {
        const keys = Object.keys({...this.form});

        keys.forEach((key) => {
          this.form[key] = null;
        });
      }
    }

  };
</script>

<style scoped>
  input, textarea {
    border: 1px solid #676767;
    height: 35px;
    padding: 5px;
    font-size: larger;
    width: 100%;
  }

  .hasError input, .hasError textarea {
    border-color: red;
  }

  textarea {
    height: 150px;
    resize: none;
  }
</style>
