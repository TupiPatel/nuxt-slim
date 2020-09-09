<template>
    <div class="HeaderLinks">
        <nuxt-link to="/videos"  v-if="isAuthenticated"><label class="link">Videos</label></nuxt-link>
        <label @click="logout" v-if="isAuthenticated" class="link"> Logout </label> 
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
         // console.log( this.$store.getters['store/isAuthenticated'])
      return this.$store.getters['store/isAuthenticated'];
    }
    }
}
</script>
