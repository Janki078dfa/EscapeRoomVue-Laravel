<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h4>Create Booking</h4></div>
                <div class="card-body">
                    <form @submit.prevent="create">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" v-model="booking.name">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Company</label>
                                    <input type="text" class="form-control" v-model="booking.company">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" v-model="booking.email">
                                </div>
                            </div>

                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" minlength="9" maxlength="9" class="form-control"
                                           v-model="booking.phone">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Country</label>
                                    <input type="text" class="form-control"
                                           v-model="booking.country">
                                </div>
                            </div>

                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Select the user:</label>
                                    <select @change="getUserValue($event)" name="user-select" class="form-select">
                                        <option selected>-</option>
                                        <option v-for="u in users" :key="u.id" :value="u.id">{{ u.name }}</option>
                                    </select>
                                </div>
                            </div>

                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Select the room:</label>
                                    <select @change="getRoomValue($event)" name="room-select" class="form-select">
                                        <option selected>-</option>
                                        <option v-for="r in rooms" :key="r.id" :value="r.id">{{ r.name }}</option>
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
    name: "createBooking",
    data() {
        return {
            booking: {
                name: "",
                company: "",
                email: "",
                phone: "",
                country: "",
                user_id: "",
                room_id: "",
            },
            users: [], rooms: [],
        }
    },
    mounted() {
        this.readUsers()
        this.readRooms()
    },

    methods: {
        async create() {
            await this.axios.post('/api/booking', this.booking).then(response => {
                this.$router.push({name: "showBooking"})
            }).then(response => {
                console.log(response)
            }).catch(error => {
                console.log(error.response)
            });

        },

        async readUsers() {
            await this.axios.get('/api/user').then(response => {
                this.users = response.data
            }).catch(error => {
                console.log(error)
                this.users = []
            })
        },

        async readRooms() {
            await this.axios.get('/api/room').then(response => {
                this.rooms = response.data
            }).catch(error => {
                console.log(error)
                this.rooms = []
            })
        },

        async getUserValue(event) {
            this.booking.user_id = event.target.value;
        },

        async getRoomValue(event) {
            this.booking.room_id = event.target.value;
        }


    }
}
</script>
