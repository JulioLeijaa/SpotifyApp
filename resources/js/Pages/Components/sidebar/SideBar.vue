<template>
    <div class="content">
        <!-- {{$page['props']}} -->
        <div class="flex flex-col mx-3">
            <navigation class="mb-4" />
            <hr />
            <playlists class="mt-4" :playlists="playlists" />
        </div>
        
    </div>
</template>

<script>

import { computed, onMounted, ref } from 'vue'
import axios from 'axios'
import { usePage } from '@inertiajs/inertia-vue3'
import { Inertia } from '@inertiajs/inertia'
import Playlists from './Playlists.vue'
import Navigation from './Navigation.vue'

export default {
    name:'SideBar',
    props:{
        posts: Array
    },
    components:{
        Playlists,
        Navigation
    },
    setup() {    

        const playlists = ref(null)
        onMounted(async () => {
            let response = await axios.get('/playlists')
            playlists.value = response.data
        });
        // console.log(playlists);
        return { playlists }
    }
}
</script>

<style scoped>
.content{
    background-color: #080404;
}
</style>