<template>
    <div></div>
</template>
<script>
export default {
     mounted(){
 
      if(localStorage.getItem('loggedIn') === 'true' ){
          console.log ('login check');

          this.$router.push('/login')
      }
      else{
          this.$router.push('/videos')
      }
   }
}
</script>
