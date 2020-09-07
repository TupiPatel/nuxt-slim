export const state = () => ({
    counter: 0,
    loggedIn : true
  })
  
  export const mutations = {
    increment(state) {
      state.counter++
    },
    login(state){
      state.loggedIn = true
    },
    logout(state){
      localStorage.removeItem("loggedIn")
      state.loggedIn = false
      this.$router.push('/login')
    }
  }

  export const getters = {
    isAuthenticated(state) {
      return state.loggedIn
    },
  
    
  }