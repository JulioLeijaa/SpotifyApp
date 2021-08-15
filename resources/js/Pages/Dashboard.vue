<template>
    <div class="h-screen flex flex-col">
        <div class="h-5/6 flex flex-row">
            <side-bar class="w-2/12" />
            <content class="w-10/12" />
        </div>
        <div class="h-1/6 ">
            <h1>Abajo</h1>
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
                    <welcome />
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
    }
</script>
