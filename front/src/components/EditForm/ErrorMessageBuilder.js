export default {
  messages: {
    required: 'This information is required.',
    email: 'Please enter a valid email address.',
    default: 'Unknown error.',
  },

  getFirstError(vuelidate) {
    if (vuelidate.$dirty) {
      if (vuelidate.$invalid) {
        const invalidRule = Object.keys(vuelidate.$params).find(key => !vuelidate[key]);
        return this.messages[invalidRule] || this.messages.default;
      }
    }
    return null;
  },
};
