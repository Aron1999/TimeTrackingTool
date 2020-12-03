
<template>
<div>
</div>
</template>

<script>
import FormMixin from '../../mixins/FormMixin';
export default {
  mixins: [ FormMixin ],
  props: ['formaction'],
  data() {
    return {
      'action': this.formaction,
    }
  }
}
</script>