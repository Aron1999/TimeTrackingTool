
<template>
<div>
</div>
</template>

<script>
import FormMixin from '../../mixins/FormMixin';
export default {
  mixins: [ FormMixin ],
  props: ['formaction','organisation'],
  data() {
    return {
      'action': this.formaction,
    }
  },
  mounted(){
    this.fields = this.organisation;
    console.log(this.organisation)
  }
}
</script>