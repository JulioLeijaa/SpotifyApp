<template>
    <div class="content">
        <!-- {{users}} -->
        <div class="flex flex-col mx-3">
            <navigation class="mb-4" />
            <hr />
            <playlists class="mt-4" />
        </div>
        
    </div>
</template>

<script>

import { computed } from 'vue'
import { usePage } from '@inertiajs/inertia-vue3'
import Playlists from './Playlists.vue'
import Navigation from './Navigation.vue'

export default {
    name:'SideBar',
    props:['users'],
    components:{
        Playlists,
        Navigation
    }
    // setup(props) {
    //     const user = props.usersList;
    //     console.log(props)
    //     return { user }
    // }
}
</script>

<style scoped>
.content{
    background-color: #080404;
}
</style>