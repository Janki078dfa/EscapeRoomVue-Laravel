<template>
    <div class="row">
        <div class="col-12 mb-2">
            <!-- llamamos al componente para Crear   -->
            <router-link :to='{name:"createRoom"}' class="btn btn-success"><i class="fas fa-plus-circle"></i>
            </router-link>
        </div>
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="bg-primary text-white">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Date</th>
                        <th>Available</th>
                        <th>Name of the game</th>
                        <th>Manage</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="r in room" :key="r.id">
                        <td>{{ r.id }}</td>
                        <td>{{ r.name }}</td>
                        <td>{{ r.date }}</td>
                        <td>{{ r.available }}</td>
                        <td>{{ r.game_id }}</td>
                        <td>
                            <router-link :to='{name:"updateRoom",params:{id:r.id}}' class="btn btn-info"><i
                                class="fas fa-edit"></i></router-link>
                            <a type="button" @click="deleteRoom(r.id)" class="btn btn-danger"><i
                                class="fas fa-trash"></i></a>
                        </td>
                    </tr>
                    </tbody>

                </table>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "rooms",
    data() {
        return {
            room: []
        }
    },
    mounted() {
        this.showRooms()
    },
    methods: {
        async showRooms() {
            await this.axios.get('/api/room').then(response => {
                this.room = response.data
            }).catch(error => {
                console.log(error)
                this.room = []
            })
        },

        deleteRoom(id) {
            console.log(id);
            this.axios.delete(`/api/room/${id}`).then(response => {
                this.showRooms()
            }).catch(error => {
                console.log(error.response)
            });

        }
    }
}
</script>
