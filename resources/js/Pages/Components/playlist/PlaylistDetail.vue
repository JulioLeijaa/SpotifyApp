<template>
    <div class="scroll flex flex-col bg-black">
        <div class="p-10 flex flex-row">
            <div>
                <img :src="playlists.url_image" alt="" srcset="" class="h-48 w-48">
            </div>
            <div class="ml-8 flex flex-col h-48 ">
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
                <div class="mx-10">
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
                                            Role
                                        </th>
                                    
                                    </tr>
                                </thead>
                                <tbody class="bg-black divide-y divide-gray-800">
                                    <tr v-for="song of playlists.songs" :key="song.id">
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
</style>