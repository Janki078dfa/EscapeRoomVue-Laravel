<template>
    <div class="row">
        <div class="col-12 mb-2">
            <!-- llamamos al componente para Crear   -->
            <router-link :to='{name:"createReview"}' class="btn btn-success"><i class="fas fa-plus-circle"></i>
            </router-link>
        </div>
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="bg-primary text-white">
                    <tr>
                        <th>ID</th>
                        <th>Comment</th>
                        <th>Rate</th>
                        <th>User ID</th>
                        <th>Room ID</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="r in review" :key="r.id">
                        <td>{{ r.id }}</td>
                        <td>{{ r.comment }}</td>
                        <td>{{ r.rate }}</td>
                        <td>{{ r.user_id }}</td>
                        <td>{{ r.room_id }}</td>
                        <td>
                            <router-link :to='{name:"updateReview",params:{id:r.id}}' class="btn btn-info"><i
                                class="fas fa-edit"></i></router-link>
                            <a type="button" @click="deleteGame(r.id)" class="btn btn-danger"><i
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
    name: "reviews",
    data() {
        return {
            review: []
        }
    },
    mounted() {
        this.showReviews()
    },
    methods: {
        async showReviews() {
            await this.axios.get('/api/review').then(response => {
                this.review = response.data
            }).catch(error => {
                console.log(error)
                this.review = []
            })
        },

        deleteGame(id) {
            console.log(id);
            this.axios.delete(`/api/review/${id}`).then(response => {
                this.showReviews()
            }).catch(error => {
                console.log(error.response)
            });

        }
    }
}
</script>
