
<template>
<div>
</div>
</template>

<script>
import FormMixin from '../../mixins/FormMixin';
export default {
  mixins: [ FormMixin ],
  props: ['formaction','project'],
  data() {
    return {
      'action': this.formaction,
    }
  },
  mounted(){
    this.fields = this.project;
    // console.log(this.project)
  }
}
</script>