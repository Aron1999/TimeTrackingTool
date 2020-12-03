
<template>
<div>
</div>
</template>

<script>
import FormMixin from '../../mixins/FormMixin';
export default {
  mixins: [ FormMixin ],
  props: ['formaction', 'user'],
  data() {
    return {
     'action': this.formaction,
    }
  },
    mounted(){
    this.fields = this.user;
    console.log(this.action)
    console.log('test')
  }
}
</script>