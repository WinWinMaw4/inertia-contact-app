<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="my-5">
                    <div class="d-flex justify-content-between align-items-center">
                        <h1 class="mb-3">User Details</h1>
                        <div>
                            <Link :href="`/user/`+user.id+`/edit`" class="btn btn-sm btn-outline-warning me-2">
                                <i class="fas fa-pencil-alt "></i>
                            </Link>
                            <button @click="delUser(user.id)" class="btn btn-sm btn-outline-danger me-2">
                                <i class="fa-solid fa-trash-alt"></i>
                            </button>
                            <Link href="/user" class="btn btn-outline-primary">User List</Link>
                        </div>
                    </div>
                    <div>
                        <div><span class="text-black-50">Id : </span>{{user.id}}</div>
                        <div><span class="text-black-50">Name : </span> {{user.name}}</div>
                        <div><span class="text-black-50">Email : </span> {{user.email}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "Show",
    props:['user','status'],
    methods: {
        delUser(id) {
            this.$swal.fire({
                title: 'Are you sure?',
                text: "You Really Want To Delete",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: 'var(--bs-primary)',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    this.$inertia.delete(`/user/${id}`,{
                        preserveScroll:true,
                        onSuccess:()=>{
                            const Toast = this.$swal.mixin({
                                toast: true,
                                position: 'top-end',
                                showConfirmButton: false,
                                timer: 3000,
                                timerProgressBar: true,
                                didOpen: (toast) => {
                                    toast.addEventListener('mouseenter', this.$swal.stopTimer)
                                    toast.addEventListener('mouseleave', this.$swal.resumeTimer)
                                }
                            })

                            // Toast.fire({
                            //     icon: 'success',
                            //     title: this.status
                            // })
                        }
                    });
                }
            })
        }
    },
}
</script>

<style scoped>

</style>
