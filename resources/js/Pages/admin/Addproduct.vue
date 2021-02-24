<template>
    <app-layoutt>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Add New Product
            </h2>
        </template>

        <div class="py-12">


          <div class="py-20 h-screen bg-gray-300 px-2">
              <div class="max-w-md mx-auto bg-white rounded-lg overflow-hidden md:max-w-lg">
                  <div class="md:flex">
                      <div class="w-full px-4 py-6 ">
                        <div class="mb-1"> <span class="text-sm">Product name</span> <input v-model="title" type="text" class="h-12 px-3 w-full border-blue-400 border-2 rounded focus:outline-none focus:border-blue-600"> </div>
                          <div class="mb-1"> <span class="text-sm">Price ($)</span> <input v-model="price" type="number" class="h-12 px-3 w-full border-blue-400 border-2 rounded focus:outline-none focus:border-blue-600"> </div>
                          <div class="mb-1"> <span class="text-sm">Description</span> <textarea v-model="description" type="text" class="h-24 py-1 px-3 w-full border-2 border-blue-400 rounded focus:outline-none focus:border-blue-600 resize-none"></textarea> </div>
                          <div class="mt-3 text-right">
                             <button @click="CreateProduct()" class="ml-2 h-10 w-32 bg-blue-600 rounded text-white hover:bg-blue-700">Create</button>
                           </div>
                      </div>
                  </div>
              </div>
          </div>


        </div>
    </app-layoutt>
</template>

<script>
    import AppLayoutt from '@/Layouts/AppLayoutt'
    export default {
        components: {
            AppLayoutt,
        },
        props:{
          title : String,
          price: Number,
          description: Text ,
        },
        methods:{
          CreateProduct(){
            this.$inertia.post('/admin/createproduct',{title:this.title,price:this.price,description:this.description})
          },
        }


    }
</script>
