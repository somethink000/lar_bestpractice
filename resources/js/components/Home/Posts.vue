<script>

    
    import { defineComponent } from 'vue';
    import { usePostsStore } from "@/stores/posts";
	import { mapStores } from 'pinia'
    import moment from 'moment';
    
    import CreatePostForm from './CreatePostForm.vue';
    import ProductCard from './ProductCard.vue';

    

    export default defineComponent({
		components: {
            CreatePostForm,
            ProductCard,

		},
		data: () => ({
            createForm: false,
            postCard: false,
            
		}),
		computed: {
			...mapStores(usePostsStore),	
		},
		mounted() {
            
            this.postsStore.get()
            
		},
		methods: {
            closeBoxForm() {this.createForm = false;},
			openBoxForm() {this.createForm = true;},

            closePostCard() {this.postCard = false;},
            openPostCard(id) {this.postsStore.show(id); this.postCard = true;},
			
            getFromDate(date){
                return moment(date).fromNow();
            },
			
		}
	});

</script>


<template>



<div class="max-w-screen-xl mx-auto">

    <CreatePostForm v-if="this.createForm" @close-boxform="closeBoxForm()"/>

    <ProductCard v-if="this.postCard" @close-postCard="closePostCard()"/>
    
    <button @click="openBoxForm()" type="button" class="max-w-[140px] w-auto py-1 px-2 my-4 flex justify-center items-center bg-gray-600 hover:bg-red-700 active:bg-gray-600 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md rounded-lg ">
        <img width="24" class="mr-2" src="images/plus.png" alt="">
        Add post
    </button>

    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10">

        <div class="rounded overflow-hidden shadow-lg flex flex-col" v-for="post in postsStore.posts" :key="post.id" @click="openPostCard(post.id)">
            <a href="#"></a>
            <div class="w-full flex">
                
                <div
                    class="text-xs top-0 right-0 bg-indigo-600 px-4 py-1 text-white hover:bg-white hover:text-indigo-600 transition duration-500 ease-in-out">
                    Cooking
                </div>
                
            </div>
            <div class="px-6 py-4 mb-auto">
                <a href="#"
                    class="font-medium text-lg inline-block hover:text-indigo-600 transition duration-500 ease-in-out inline-block mb-2">{{ post.title}}</a>
                <p class="text-gray-500 text-sm">
                    {{ post.text }}
                </p>
            </div>
            <div class="px-6 py-3 flex flex-row items-center justify-between bg-gray-100">
                <span href="#" class="py-1 text-xs font-regular text-gray-900 mr-1 flex flex-row items-center">
                    <svg height="13px" width="13px" version="1.1" id="Layer_1"
                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px"
                        y="0px" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512;"
                        xml:space="preserve">
                        <g>
                            <g>
                                <path
                                    d="M256,0C114.837,0,0,114.837,0,256s114.837,256,256,256s256-114.837,256-256S397.163,0,256,0z M277.333,256 c0,11.797-9.536,21.333-21.333,21.333h-85.333c-11.797,0-21.333-9.536-21.333-21.333s9.536-21.333,21.333-21.333h64v-128 c0-11.797,9.536-21.333,21.333-21.333s21.333,9.536,21.333,21.333V256z">
                                </path>
                            </g>
                        </g>
                    </svg>
                    <span class="ml-1">{{ getFromDate(post.created_at) }}</span>
                </span>

                <span href="#" class="py-1 text-xs font-regular text-gray-900 mr-1 flex flex-row items-center">
                    <svg class="h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z">
                        </path>
                    </svg>
                    <span class="ml-1">39 Comments</span>
                </span>
            </div>
        </div>


    </div>

</div>

</template>