<template>
    <div class="content">
        <!-- {{users}} -->
        <div class="flex flex-col mx-2">
            <div >
                <img src="assets/spotify.png" width="175" height="40" alt="" srcset="">
            </div>
            <div class="flex flex-row place-items-center my-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-2" viewBox="0 0 20 20" fill="white">
                <path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z" />
                </svg>
                <span class="text-md font-bold text-white ml-2">Inicio</span>
            </div>
            <div class="flex flex-row place-items-center my-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-2" fill="none" viewBox="0 0 24 24" stroke="white">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z" />
                </svg>
                <span class="text-md font-bold text-white ml-2">Buscar</span>
            </div>
            <div class="flex flex-row place-items-center my-2">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mx-2" fill="none" viewBox="0 0 24 24" stroke="white">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                </svg>
                <span class="text-md font-bold text-white ml-2">Tu biblioteca</span>
            </div>
            
            
        </div>
        
    </div>
</template>

<script>

import { computed } from 'vue'
import { usePage } from '@inertiajs/inertia-vue3'

export default {
    name:'SideBar',
    props:['users'],
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