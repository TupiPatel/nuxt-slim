<template>
  <div class="container">
   Counter : {{this.$store.state.store.counter}}
   <button @click="add_one"> Add </button>
    <div>
      <b-card>
        Welcome To Our Video Library, Please Log In
        
        <b-form @submit="onSubmit">
          <b-form-group
            id="input-group-1"
            label="Email address:"
            label-for="input-1"
          >
           
          </b-form-group>
          <b-button type="submit" variant="primary">Submit</b-button>
        </b-form>
      </b-card>
    </div>
  </div>
</template>