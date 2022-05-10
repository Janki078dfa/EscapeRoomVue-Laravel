<template>
    <div class="row">
        <div class="col-12 mb-2">
            <router-link :to='{name:"createUser"}' class="btn btn-success"><i class="fas fa-plus-circle"></i>
            </router-link>
        </div>
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="bg-primary text-white">
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>DNI</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr v-for="u in user" :key="u.id">
                        <td>{{ u.id }}</td>
                        <td>{{ u.name }}</td>
                        <td>{{ u.dni }}</td>
                        <td>{{ u.phone }}</td>
                        <td>{{ u.email }}</td>

                        <td>
                            <router-link :to='{name:"updateUser",params:{id:u.id}}' class="btn btn-info"><i
                                class="fas fa-edit"></i></router-link>
                            <a type="button" @click="deleteUser(u.id)" class="btn btn-danger"><i
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
    name: "users",
    data() {
        return {
            user: []
        }
    },
    mounted() {
        this.showUsers()
    },
    methods: {
        async showUsers() {
            await this.axios.get('/api/user').then(response => {
                this.user = response.data
            }).catch(error => {
                console.log(error)
                this.user = []
            })
        },

        deleteUser(id) {
            console.log(id);
            this.axios.delete(`/api/user/${id}`).then(response => {
                this.showUsers()
            }).catch(error => {
                console.log(error.response)
            });

        }
    }
}
</script>
