<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="my-5">
                    <div class="d-flex justify-content-between align-items-center">
                        <h1 class="mb-3">User Lists</h1>
                        <div>
                            <Link href="/user/create" class="btn btn-outline-primary">User Create</Link>
                        </div>
                    </div>
                    <ul class="list-group mb-3">
                        <li v-for="user in users.data" :key="user.id"  @click="showAlert" class="list-group-item d-flex justify-content-between align-items-center ">
                           <div class="">
                               {{user.name}}<br>
                               <span class="small text-black-50">{{user.email}}</span>
                           </div>
                            <div class="btn-group btn-group-sm">
                                <Link :href="`user/`+user.id" class="btn btn-outline-info">
                                    <i class="fa-solid fa-info-circle"></i>
                                </Link>
                                <Link :href="`user/`+user.id+'/edit'" class="btn btn-outline-warning">
                                    <i class="fa-solid fa-pencil-alt"></i>
                                </Link>
                               <DeleteButton :id="user.id" />
<!--                                <Link :href="`user/`+user.id" method="delete" as="button" class="btn btn-outline-danger" preserve-scroll>-->
<!--                                    <i class="fa-solid fa-trash-alt"></i>-->
<!--                                </Link>-->
                            </div>
                        </li>
                    </ul>
                    <Pagination :links="users.links" />
                </div>
            </div>
        </div>
    </div>
</template>

<script>
// import Swal from 'sweetalert2/dist/sweetalert2'
import DeleteButton from "../../Component/DeleteButton";
import Pagination from "../../Component/Pagination";
export default {
    name: "Index",
    components:{Pagination,DeleteButton},
    props:['users','status'],
    methods: {
        // del(id) {
        //     this.$swal.fire({
        //         title: 'Are you sure?',
        //         text: "You won't be able to revert this!",
        //         icon: 'warning',
        //         showCancelButton: true,
        //         confirmButtonColor: '#3085d6',
        //         cancelButtonColor: '#d33',
        //         confirmButtonText: 'Yes, delete it!'
        //     }).then((result) => {
        //         if (result.isConfirmed) {
        //                 this.$inertia.delete(`user/${id}`,{
        //                     preserveScroll:true,
        //                     onSuccess:()=>{
        //                         const Toast = this.$swal.mixin({
        //                             toast: true,
        //                             position: 'top-end',
        //                             showConfirmButton: false,
        //                             timer: 3000,
        //                             timerProgressBar: true,
        //                             didOpen: (toast) => {
        //                                 toast.addEventListener('mouseenter', this.$swal.stopTimer)
        //                                 toast.addEventListener('mouseleave', this.$swal.resumeTimer)
        //                             }
        //                         })
        //
        //                         Toast.fire({
        //                             icon: 'success',
        //                             title: this.status
        //                         })
        //                     }
        //                 });
        //         }
        //     })
        //
        //
        // },
        showAlert(){
            // this.$swal('Hello Vue world!!!');
        }
    },
    mounted() {
        if(this.status){
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

            Toast.fire({
                icon: 'success',
                title: this.status
            })
        }
    }
}
</script>

<style scoped>

</style>
