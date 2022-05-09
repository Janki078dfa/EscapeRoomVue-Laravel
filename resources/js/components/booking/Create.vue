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
                                    <select name="user-select" class="form-select" aria-label="Default select example">
                                        <option selected>Select the user you want to assign:</option>
                                        <option v-for="u in users" :key="u.id">{{ u.name }}</option>
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
                user_id: 1,
                room_id: 1
            },
            users: []
        }
    },
    mounted() {
        this.read()
    },
    methods: {
        async create() {
            await this.axios.post('/api/booking', this.booking).then(response => {
                this.$router.push({name: "showBookings"})
            }).then(response => {
                console.log(response)
            })
                .catch(error => {
                    console.log(error.response)
                });

        },

        async read() {
            await this.axios.get('/api/user').then(response => {
                this.users = response.data
            }).catch(error => {
                console.log(error)
                this.users = []
            })
        }
    }
}
</script>
