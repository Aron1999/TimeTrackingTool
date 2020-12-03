
<template>
<div>
</div>
</template>

<script>
import FormMixin from '../../mixins/FormMixin';
export default {
  mixins: [ FormMixin ],
  props: ['formaction','contact'],
  data() {
    return {
      'action': this.formaction,
    }
  },
  mounted(){
    this.fields = this.contact;
    // console.log(this.contact)
  }
}
</script>