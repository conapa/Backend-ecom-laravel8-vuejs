<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Dashboard
            </h2>
        </template>

        <div class="py-12">
          <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
            <inertia-link :href="route('dashboard')">
                <button class="h-10 px-5 m-2 text-gray-100 transition-colors duration-150 bg-gray-700 rounded-lg focus:shadow-outline hover:bg-gray-800">All</button>
            </inertia-link>
            <div v-for="category in categories" v-bind:key="category.id"  class="inline-block ">
              <inertia-link :href="route('category.products',category.slug)">
                  <button class="h-10 px-5 m-2 text-gray-100 transition-colors duration-150 bg-gray-700 rounded-lg focus:shadow-outline hover:bg-gray-800">{{category.title}}</button>
              </inertia-link>
            </div>
          </div>
            <div class="max-w-2xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                  <div v-for="product in products" v-bind:key="product.id" class="py-2 inline-block">
                      <div  class="flex  bg-white shadow-lg rounded-lg overflow-hidden">

                        <img class="w-1/3 bg-cover" :src="product.image" alt="">
                        <div class="w-2/3 p-4">
                          <h1 class="text-gray-900 font-bold text-2xl">{{product.title}}</h1>
                          <p class="mt-2 text-gray-600 text-sm">{{product.description}}</p>
                          <div class="flex item-center justify-between mt-3">
                            <h1 class="text-gray-700 font-bold text-xl">{{product.price}}$</h1>
                            <inertia-link :href="route('checkout',product.slug)">
                              <button class="px-3 py-2 bg-gray-800 text-white text-xs font-bold uppercase rounded">Subscribe</button>
                            </inertia-link>
                          </div>
                        </div>
                      </div>

                  </div>
                </div>
            </div>

        </div>
    </app-layout>
</template>

<script>
    import AppLayout from '@/Layouts/AppLayout'

    export default {
        components: {
            AppLayout,
        },
        props:{
          products : Array,
          categories:Array

        },
    }
</script>
