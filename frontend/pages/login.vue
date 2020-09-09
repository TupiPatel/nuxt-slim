<template>
  <div class="container">

  <!-- Counter : {{this.$store.state.store.counter}}
   <button @click="add_one"> Add </button> -->
    <div>
      {{this.form.errors}}
      <b-card>
        <div class="heading">User Login</div>
        <b-form @submit.prevent="onSubmit">
          
            <b-form-input
              id="input-1"
              v-model="form.username"
              type="text"
              required
              placeholder="Please enter your username"
              class="txtbox"
            ></b-form-input>
          <b-button type="submit" class="btn-login">Login</b-button>
        </b-form>
      </b-card>
    </div>
  </div>
</template>

<script>
import axios from '~/plugins/axios'
export default {
   mounted(){
 
      if(localStorage.getItem('loggedIn') === 'true' ){
          console.log ('login check');

          this.$router.push('/videos')
      }
   },
  data() {
    return {
      form: {
        username: '',
        errors : ''
      },
    };
  },
  methods: {
    onSubmit () {
      let formData = new FormData()
      formData.append('data',JSON.stringify(this.form))
      
      
      axios.post('/login',formData)
        .then((Response) => {
          console.log(Response.data.data.id);
          localStorage.setItem('loggedIn', "true");
          this.$store.commit('store/login')
          this.$router.push('/videos')
        })
        .catch((err) => {
          this.form.errors = "The user you requested does not exist"
        })
       
     
    },
    add_one(){
         
      this.$store.commit('store/increment')
    },
   
  }
}
</script>
