<template>
    <div class="scroll flex flex-col bg-black">
        <div class="header h-20 w-full flex flex-row-reverse items-center">
            <div class="logout h-1" @click.prevent="logout">
                <p>Cerrar sesión</p>
            </div>
            <!-- <div class="line"></div>
            <h1 class="m-4 font-bold text-header">Premium</h1>
            <h1 class="m-4 font-bold text-header">Ayuda</h1>
            <h1 class="m-4 font-bold text-header">Descargar</h1> -->
        </div>
        <div class="p-10 flex flex-row">
            <div>
                <img :src="playlists.url_image" alt="" srcset="" class="h-48 w-48">
            </div>
            <div class="ml-6 flex flex-col h-48 justify-end">
                <p class="text-white text-blond text-base">PLAYLIST</p>
                <p class="text-white text-blond text-5xl">{{playlists.name}}</p>
            </div>   
        </div>
        <div class="flex flex-col ">
            <div class="flex flex-row py-2 px-8 items-center">
                <div class="bg-white rounded-full">
                    <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60"  class="bi bi-play-circle-fill fill-current green" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zM6.79 5.093A.5.5 0 0 0 6 5.5v5a.5.5 0 0 0 .79.407l3.5-2.5a.5.5 0 0 0 0-.814l-3.5-2.5z"/>
                    </svg>
                </div>
                <div class="mx-10" v-if="playlists.id !== 3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" class="bi bi-heart-fill fill-current green" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M8 1.314C12.438-3.248 23.534 4.735 8 15-7.534 4.736 3.562-3.248 8 1.314z"/>
                    </svg>
                </div>
            </div>
            <div class="flex flex-col">
                
                    <div class="py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8">
                        <div class="shadow ">
                            <table class="min-w-full divide-y divide-gray-800">
                                <thead class="bg-black">
                                    <tr>
                                        <th scope="col" class="relative px-6 py-3 text-white">
                                            #
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                            Título
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                            Álbum
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                            Fecha Incorporación
                                        </th>
                                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-white uppercase tracking-wider">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-clock" viewBox="0 0 16 16">
                                            <path d="M8 3.5a.5.5 0 0 0-1 0V9a.5.5 0 0 0 .252.434l3.5 2a.5.5 0 0 0 .496-.868L8 8.71V3.5z"/>
                                            <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm7-8A7 7 0 1 1 1 8a7 7 0 0 1 14 0z"/>
                                            </svg>
                                        </th>
                                    
                                    </tr>
                                </thead>
                                <tbody class="bg-black divide-y divide-gray-800">
                                    <tr v-for="song of playlists.songs" :key="song.id" @click="sendfather(playlists.songs)">
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-white text-opacity-75">
                                            {{song.id}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                             <div class="flex items-center">
                                                <div class="flex-shrink-0 h-10 w-10">
                                                    <img class="h-10 w-10 rounded-full" :src="song.url_image" alt="">
                                                </div>
                                                <div class="ml-4">
                                                    <div class="text-sm text-blond font-medium text-white ">
                                                        {{song.title}}
                                                    </div>
                                                    <div class="text-sm text-white text-opacity-75">
                                                        {{song.artist}}
                                                    </div>
                                                </div>
                                                </div>
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap">
                                            <div class="text-sm text-white text-opacity-75">{{song.album}}</div>
                                            <!-- <div class="text-sm text-white text-opacity-75">Optimization</div> -->
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-white text-opacity-75">
                                            {{song.created_at}}
                                        </td>
                                        <td class="px-6 py-4 whitespace-nowrap text-sm text-white text-opacity-75">
                                            2:30
                                        </td>
                                    </tr>
                                    
                                </tbody>
                            </table>
                        </div>
                    </div>
                
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name:'PlaylistDetail',
    props: {
        playlists: Object
    },
    methods: {
            logout() {
                this.$inertia.post(route('logout'));
            },
            sendfather(data) {
                // let datos = await axios.get(...);
                this.$emit('songs', data);
            }
        }
}
</script>

<style scoped>
.scroll{
    overflow-y: auto;
}
.green{
    color: #1db954;
}
.logout {
    align-items: center;
    background-color: rgba(0, 0, 0, 0.7);
    border: 0;
    border-radius: 23px;
    color: #fff;
    cursor: pointer;
    display: flex;
    gap: 8px;
    height: 32px;
    justify-content: center;
    margin-inline-start: 16px;
    min-width: 32px;
    padding: 2px 10px;
    position: relative;
    margin: 16px;
}

.logout:hover {
    background-color: #282828;
}
</style>