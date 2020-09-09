<template>
  <div>
      <div class="NavHeader">
          <AlgeaCalLogo />
          <HeaderNav />
      </div>
    <Nuxt />
    <FooterNav />
  </div>
</template>

<script>

    import HeaderNav from '~/components/HeaderNav'
    import FooterNav from '~/components/FooterNav'
    import AlgeaCalLogo from '~/components/AlgeaCalLogo'

    export default {

        components: {
            HeaderNav,
            FooterNav,
            AlgeaCalLogo
        },

    }

</script>


