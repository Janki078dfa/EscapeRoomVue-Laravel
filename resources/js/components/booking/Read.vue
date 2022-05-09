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
                        <th>Title</th>
                        <th>Content</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="blog in booking" :key="blog.id">
                        <td>{{ blog.id }}</td>
                        <td>{{ blog.name }}</td>
                        <td>{{ blog.company }}</td>
                        <td>
                            <!-- llamamos al componente para Editar     -->
                            <router-link :to='{name:"editarBlog",params:{id:blog.id}}' class="btn btn-info"><i
                                class="fas fa-edit"></i></router-link>
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
    }
}
</script>
