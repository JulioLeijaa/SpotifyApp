<template>
  <nav class="navbar">
      <div>
        Spotify
      </div>
      <ul>
          <li>
              <Link :href="route('login')" class="">
                  Login
              </Link>
          </li>
          <li>
              <Link :href="route('register')" class="">
                  Registrate
              </Link>
          </li>
      </ul>
  </nav>
</template>

<style scoped>
.navbar{
    background-color: #000;
    color: #fff;
    display: flex;
    justify-content: space-around;
    align-items: center;
    font-size: 20px;

}

.navbar ul{
    list-style-type: none;
}

.navbar li{
    display: inline-block;
    padding: 20px 10px;
}
</style>

<script>
    import { Head, Link } from '@inertiajs/inertia-vue3';

    export default {
        components: {
            Head,
            Link,
        },

        props: {
            canLogin: Boolean,
            canRegister: Boolean,
            laravelVersion: String,
            phpVersion: String,
        }
    }
</script>
