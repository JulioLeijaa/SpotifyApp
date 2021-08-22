<template>
    <div class="h-screen flex flex-col">
        <div class="h-5/6 flex flex-row">
            <side-bar class="w-1/5" />
            <content :playlists="playlists" class="w-4/5" />
        </div>
        <div class="h-1/6 ">
            <music-player class="w-full h-full" />
        </div>
    </div>
    <!-- <app-layout title="Dashboard" >
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                </div>
            </div>
        </div>

    </app-layout> -->
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout.vue'
    import Welcome from '@/Jetstream/Welcome.vue'
    import SideBar from '@/Pages/Components/sidebar/SideBar.vue'
    import Content from '@/Pages/Components/content/Content.vue'
    import MusicPlayer from '@/Pages/Components/footer/MusicPlayer.vue'

    export default {
        components: {
            AppLayout,
            Welcome,
            SideBar,
            Content,
            MusicPlayer,
        },
        props:{
            playlists: Object
        }
    }
</script>
