<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h4>Create Game</h4></div>
                <div class="card-body">
                    <form @submit.prevent="create">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" v-model="game.name">
                                </div>
                            </div>

                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Players</label>
                                    <input type="number" class="form-control" v-model="game.players">
                                </div>
                            </div>


                            <div class="col-12">
                                <button type="submit" class="btn btn-primary">Create</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>

export default {
    name: "createGame",
    data() {
        return {
            game: {
                name: "",
                image: "hola.jpg",
                players: "",
            },
        }
    },

    methods: {
        async create() {
            await this.axios.post('/api/game', this.game).then(response => {
                this.$router.push({name: "showGame"})
            }).then(response => {
                console.log(response)
            }).catch(error => {
                console.log(error.response)
            });

        },
    }
}
</script>
