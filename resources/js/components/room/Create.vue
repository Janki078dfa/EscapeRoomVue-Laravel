<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h4>Create Room</h4></div>
                <div class="card-body">
                    <form @submit.prevent="create">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" v-model="room.name">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Date</label>
                                    <input type="date" class="form-control" v-model="room.date">
                                </div>
                            </div>

                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Select the game:</label>
                                    <select @change="getGameValue($event)" name="room-select" class="form-select">
                                        <option selected>-</option>
                                        <option v-for="g in games" :key="g.id" :value="g.id">{{ g.name }}</option>
                                    </select>
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
    name: "createRoom",
    data() {
        return {
            room: {
                name: "asdfasfdf",
                date: "sdfsdf",
                available: "1",
                game_id: ""
            },
            games: []
        }
    },
    mounted() {
        this.readGames()
    },
    methods: {
        async create() {
            await this.axios.post('/api/room', this.review).then(response => {
                this.$router.push({name: "showRoom"})
            }).then(response => {
                console.log(response)
            }).catch(error => {
                console.log(error.response)
            });

        },
        async readGames() {
            await this.axios.get('/api/game').then(response => {
                this.games = response.data
            }).catch(error => {
                console.log(error)
                this.games = []
            })
        },

        getGameValue(event) {
            this.room.game_id = event.target.value;
        }
    }
}
</script>
