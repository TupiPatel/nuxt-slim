<template>
    <div>
        <nuxt-link to="/videos"  v-if="isAuthenticated">Videos</nuxt-link>
       <!-- <nuxt-link to="/login" v-if="isAuthenticated" >Login</nuxt-link> -->
        <button @click="logout" v-if="isAuthenticated"> Logout </button> 
    </div>
</template>

<script>
import { mapGetters } from 'vuex'
export default {
     methods: {
        logout(){
            
        this.$store.commit('store/logout')
        }
    },
    computed: {
      isAuthenticated() {
          console.log( this.$store.getters['store/isAuthenticated'])
      return this.$store.getters['store/isAuthenticated'];
    }
    }
}
</script>