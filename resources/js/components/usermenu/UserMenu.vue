<script>
export default {
  props: [],
  data() {
    return {
      'userMenu' : true,
      'rotateIcon' : false,
    }
  },
  mounted(){
  },
 methods: {
    openMenu: function() {
      this.userMenu = !this.userMenu;
      this.rotateIcon = !this.rotateIcon;
    }
  }
}
</script>