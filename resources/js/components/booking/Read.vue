<template>
    <div class="row">
        <div class="col-12 mb-2">
            <!-- llamamos al componente para Crear   -->
            <router-link :to='{name:"createBooking"}' class="btn btn-success"><i class="fas fa-plus-circle"></i>
            </router-link>
        </div>
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="bg-primary text-white">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Company</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Country</th>
                        <th>User ID</th>
                        <th>Room ID</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="b in booking" :key="b.id">
                        <td>{{ b.id }}</td>
                        <td>{{ b.name }}</td>
                        <td>{{ b.company }}</td>
                        <td>{{ b.email }}</td>
                        <td>{{ b.phone }}</td>
                        <td>{{ b.country }}</td>
                        <td>{{ b.user_id }}</td>
                        <td>{{ b.room_id }}</td>
                        <td>
                            <router-link :to='{name:"updateBooking",params:{id:b.id}}' class="btn btn-info"><i
                                class="fas fa-edit"></i></router-link>
                            <a type="button" @click="deleteBooking(b.id)" class="btn btn-danger"><i
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
    name: "bookings",
    data() {
        return {
            booking: []
        }
    },
    mounted() {
        this.showBookings()
    },
    methods: {
        async showBookings() {
            await this.axios.get('/api/booking').then(response => {
                this.booking = response.data
            }).catch(error => {
                console.log(error)
                this.booking = []
            })
        },

        deleteBooking(id) {
            console.log(id);
            this.axios.delete(`/api/booking/${id}`).then(response => {
                this.showBookings()
            }).catch(error => {
                console.log(error.response)
            });

        }
    }
}
</script>
