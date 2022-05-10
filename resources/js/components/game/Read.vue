<template>
    <div class="row">
        <div class="col-12 mb-2">
            <!-- llamamos al componente para Crear   -->
            <router-link :to='{name:"createGame"}' class="btn btn-success"><i class="fas fa-plus-circle"></i>
            </router-link>
        </div>
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="bg-primary text-white">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Players</th>
                        <th>Manage</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="g in game" :key="g.id">
                        <td>{{ g.id }}</td>
                        <td>{{ g.name }}</td>
                        <td>{{ g.image }}</td>
                        <td>{{ g.players }}</td>
                        <td>
                            <router-link :to='{name:"updateGame",params:{id:g.id}}' class="btn btn-info"><i
                                class="fas fa-edit"></i></router-link>
                            <a type="button" @click="deleteGame(g.id)" class="btn btn-danger"><i
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
    name: "games",
    data() {
        return {
            game: []
        }
    },
    mounted() {
        this.showGames()
    },
    methods: {
        async showGames() {
            await this.axios.get('/api/game').then(response => {
                this.game = response.data
            }).catch(error => {
                console.log(error)
                this.game = []
            })
        },

        deleteGame(id) {
            console.log(id);
            this.axios.delete(`/api/game/${id}`).then(response => {
                this.showGames()
            }).catch(error => {
                console.log(error.response)
            });

        }
    }
}
</script>
