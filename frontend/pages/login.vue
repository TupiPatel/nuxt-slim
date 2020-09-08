<template>
  <div class="container">

  <!-- Counter : {{this.$store.state.store.counter}}
   <button @click="add_one"> Add </button> -->
    <div>
      {{this.form.errors}}
      <b-card>
        Welcome To Our Video Library, Please Log In
        <b-form @submit.prevent="onSubmit">
          
            <b-form-input
              id="input-1"
              v-model="form.username"
              type="text"
              required
              placeholder="Username"
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

<style>
.container {
  margin: 0 auto;
  min-height: 100vh;
  display: flex;
  justify-content: center;
  align-items: center;
  text-align: center;
}

.title {
  font-family: 'Quicksand',
  'Source Sans Pro',
  -apple-system,
  BlinkMacSystemFont,
  'Segoe UI',
  Roboto,
  'Helvetica Neue',
  Arial,
  sans-serif;
  display: block;
  font-weight: 300;
  font-size: 100px;
  color: #35495e;
  letter-spacing: 1px;
}

.subtitle {
  font-weight: 300;
  font-size: 42px;
  color: #526488;
  word-spacing: 5px;
  padding-bottom: 15px;
}

.links {
  padding-top: 15px;
}
.btn-login{
  background-color: #053b34 ;
}
</style>
