export default {
    data() {
      return {
        fields: {
          user_id: null,
          project_id: null,
        },
        errors: {},
        success: false,
        processing: false,
        loaded: true,
        action: '',
        response: '',
      }
    },
    methods: {
  
      submit() {
        console.log(this.fields);
        if (this.loaded) {
          this.processing = true;
          this.loaded = false;
          this.success = false;
          this.errors = {};
          axios.post(this.action, this.fields).then(response => {
            // this.fields = {}; //Clear input fields.
            this.loaded = true;
            this.success = true;
            this.processing = false;
            this.response = response.data;
            console.log(response);
          }).catch(error => {
            console.log(error);
            this.loaded = true;
            if (error.response.status === 422) {
              this.errors = error.response.data.errors || {};
              this.processing = false;
            }
          });
        }
        console.log(this.response);
      },
  
    },
  }