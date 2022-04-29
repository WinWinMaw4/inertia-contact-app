<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="my-5">
                    <div class="d-flex justify-content-between align-items-center">
                        <h1 class="mb-3">User Edit</h1>
                        <div>
                            <Link href="/user" class="btn btn-outline-primary">User List</Link>
                        </div>
                    </div>

                    <form action="" @submit.prevent="save()">
                        <!--                        {{errors}}-->
                        <div class="mb-3">
                            <label class="form-label">User Name</label>
                            <input type="text" class="form-control" :class="{'is-invalid':errors.name}" v-model="name" placeholder="John Doe" >
                            <div class="invalid-feedback">{{errors.name}}</div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">User Email</label>
                            <input type="email" class="form-control" :class="{'is-invalid':errors.email}" v-model="email" placeholder="example@gmail.com">
                            <div class="invalid-feedback">{{errors.email}}</div>
                        </div>
                        <div class="d-flex justify-content-center">
                            <button class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</template>

<script>
export default {
    name: "Edit",
    props: ['errors','user'],
    data() {
        return {
            name: this.user.name,
            email:this.user.email
        }
    },
    methods: {
        save() {
            this.$inertia.put('/user/'+this.user.id, {
                name: this.name,
                email:this.email
            })

        }
    },
}
</script>

<style scoped>

</style>
