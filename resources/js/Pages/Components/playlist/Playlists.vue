<template>
    <div class="h-screen flex flex-col">
        <div class="h-5/6 flex flex-row">
            <side-bar class="w-1/5" />
            <playlist-detail :playlists="playlists" class="w-4/5" v-on:songs="onSongs"/>
        </div>
        <div class="h-1/6 ">
            <music-player class="w-full h-full" :songs="songs"/>
        </div>
    </div>
</template>

<script>

import SideBar from '@/Pages/Components/sidebar/SideBar.vue'
import PlaylistDetail from '@/Pages/Components/playlist/PlaylistDetail.vue'
import MusicPlayer from '@/Pages/Components/footer/MusicPlayer.vue'
import { usePage } from '@inertiajs/inertia-vue3'
import { onMounted } from '@vue/runtime-core'

export default {
    name:'Playlist',
    props:{
        playlists: Object
    },
    data() {
        return {
            songs:null
        }
    },
    components:{
        SideBar,
        PlaylistDetail,
        MusicPlayer,
    },
    methods:{
        onSongs(data){
            console.log('padre')
            console.log(data)
            this.songs = data
        }
    }
}
</script>