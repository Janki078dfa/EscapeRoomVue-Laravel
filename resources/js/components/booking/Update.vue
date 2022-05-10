<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h4>Update Booking</h4></div>
                <div class="card-body">
                    <form @submit.prevent="update">
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
    name: "updateBooking",
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
        this.readBookings()
        this.readUsers()
        this.readRooms()
    },

    methods: {
        async readBookings() {
            await this.axios.get(`/api/booking/${this.$route.params.id}`).then(response => {
                const {name, company, email, phone, country, user_id, room_id} = response.data
                console.log(response);

                this.booking.name = name
                this.booking.company = company
                this.booking.email = email
                this.booking.phone = phone
                this.booking.country = country
                this.booking.user_id = user_id
                this.booking.room_id = room_id
            }).catch(error => {
                console.log(error)
            })
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
        },

        async update() {
            console.log(this.$route.params.id);
            await this.axios.put(`/api/booking/${this.$route.params.id}`).then(response => {
                this.$router.push({name: "showBooking"})
            }).catch(error => {
               console.log(error)
            });

        },


    }
}
</script>
