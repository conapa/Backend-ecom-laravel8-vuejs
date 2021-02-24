<template>
    <app-layoutt>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Orders
            </h2>
        </template>

        <div class="py-12">


            <div class="mx-auto">
              <div class="bg-white shadow-md rounded my-6">
                <table  class="text-left w-full border-collapse"> <!--Border collapse doesn't work on this site yet but it's available in newer tailwind versions -->
                  <thead>
                    <tr>
                      <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Id</th>
                      <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Product</th>
                      <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Price</th>
                      <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Delivered</th>
                      <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Date</th>
                      <th class="py-4 px-6 bg-grey-lightest font-bold uppercase text-sm text-grey-dark border-b border-grey-light">Actions</th>
                    </tr>
                  </thead>
                  <tbody v-for="order in orders" v-bind:key="order.id" >
                    <tr class="hover:bg-grey-lighter">
                      <td class="py-4 px-6 border-b border-grey-light">{{order.id}}</td>
                      <td class="py-4 px-6 border-b border-grey-light">{{order.product_name}}</td>
                      <td class="py-4 px-6 border-b border-grey-light">{{order.price}} $ </td>
                      <td v-if="order.delivered" class="py-4 px-6 border-b border-grey-light">Yes</td>
                      <td v-if="!order.delivered" class="py-4 px-6 border-b border-grey-light">No</td>
                      <td class="py-4 px-6 border-b border-grey-light">{{moment(order.created_at).format("DD-MM-YYYY")}}</td>
                      <td class="py-4 px-6 border-b border-grey-light">
                        <inertia-link :href="route('update.order',order.id)" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark">
                          Delivered
                        </inertia-link>
                        <inertia-link :href="route('delete.order',order.id)" class="text-grey-lighter font-bold py-1 px-3 rounded text-xs bg-green hover:bg-green-dark">
                          Delete
                        </inertia-link>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>


        </div>
    </app-layoutt>
</template>

<script>
    import AppLayoutt from '@/Layouts/AppLayoutt'
    import moment from "moment";

    export default {
        components: {
            AppLayoutt,
            moment,
        },
        props:{
          orders : Array

        },
        data() {
        return {
            moment: moment
        }
      },
    }
</script>
