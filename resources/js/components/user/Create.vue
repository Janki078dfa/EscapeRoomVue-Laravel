<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header"><h4>Create User</h4></div>
                <div class="card-body">
                    <form @submit.prevent="create">
                        <div class="row">
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" v-model="user.name">
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>DNI</label>
                                    <input type="text" minlength="9" maxlength="9" class="form-control"
                                           v-model="user.dni">
                                </div>
                            </div>

                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Phone</label>
                                    <input type="text" minlength="9" maxlength="9" class="form-control"
                                           v-model="user.phone">
                                </div>
                            </div>

                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Email</label>
                                    <input type="email" class="form-control" v-model="user.email">
                                </div>
                            </div>

                            <div class="col-12 mb-2">
                                <div class="form-group">
                                    <label>Password</label>
                                    <input type="password" minlength="5" maxlength="20" class="form-control"
                                           v-model="user.password">
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
    name: "createUser",
    data() {
        return {
            user: {
                name: "",

                dni: "",
                phone: "",
                email: "",
                password: "",
            },
        }
    },

    methods: {
        async create() {
            await this.axios.post('/api/user', this.user).then(response => {
                this.$router.push({name: "showUser"})
            }).then(response => {
                console.log(response)
            }).catch(error => {
                console.log(error.response)
            });

        },
    }
}
</script>
