<script>
    import { defineComponent } from 'vue';
    import { usePostsStore } from "@/stores/posts";
	import { mapStores } from 'pinia'
    
    export default defineComponent({
		components: {
            
		},
		data: () => ({
            inEdit: false,
            form: {
                title: "",
                text: "",
            },
		}),
		computed: {
            ...mapStores(usePostsStore),	
		},
		mounted() {

 
		},
		methods: {
            toggleEdit() {
                this.inEdit = !this.inEdit;
                this.form.title = this.postsStore.current.title;
                this.form.text = this.postsStore.current.text;
            },
            submit() {
                this.postsStore.update(this.form);
                this.toggleEdit();
            },

            deletePost() {
                this.postsStore.delete(this.postsStore.current.id);
                closePostCard();
            },

            closePostCard() {
                this.$emit('close-postCard')
            }
		}
	});

</script>

<template>

<div class="fixed inset-0 z-40 min-h-full overflow-y-auto overflow-x-hidden transition flex items-center">
  <!-- overlay -->
  <div aria-hidden="true" class="fixed inset-0 w-full h-full bg-black/50 cursor-pointer">
  </div>

    <div class="relative w-full">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 lg:py-8 bg-white rounded-lg shadow-md rounded-2xl border-4 border-gray-400">
        
        <div class="flex items-center gap-2">
            <img src="/images/cross.png" @click="closePostCard()"  class="invert-100 cursor-pointer" width="24" alt="">
            <img src="/images/edit.png" @click="toggleEdit()" class="invert-100 cursor-pointer" width="24" alt="">
            <img src="/images/trash.png" @click="deletePost()" class="invert-100 cursor-pointer" width="24" alt="">
        </div>
            

            <div class="flex flex-col md:flex-row -mx-4" v-if="postsStore.current">
                <!-- left -->
                <div class="md:flex-1 px-4">
                    <div class="h-[460px] rounded-lg bg-gray-300 dark:bg-gray-700 mb-4">
                        <img class="w-full h-full object-cover" src="https://cdn.pixabay.com/photo/2020/05/22/17/53/mockup-5206355_960_720.jpg" alt="Product Image">
                    </div>
                    
                </div>
                <!-- right -->
                <div class="md:flex-1 px-4 overflow-hidden">
                    
                    <div v-if="!inEdit">
                        
                        <h2 class="text-2xl font-bold text-gray-800 mb-2">{{ postsStore.current.title }}</h2>
                        <p class="text-gray-600  text-sm mt-2" style="white-space: pre-line">
                            {{ postsStore.current.text }}
                        </p>
                    </div>
                    <div v-else class="mt-4">
                        <input
                            id="Full Name"
                            class="border p-3 shadow-md  border-gray-700 placeholder:text-base focus:outline-none ease-in-out duration-300 rounded-lg w-full"
                            type="text"
                            placeholder="Full Name"
                            required
                            v-model="form.title"
                        />

                        <textarea
                                    id="email"
                                    class="mt-2 border p-3  border-gray-700 shadow-md placeholder:text-base focus:outline-none ease-in-out duration-300 rounded-lg w-full"
                                    type="email"
                                    placeholder="Email"
                                    required
                                    v-model="form.text"
                                ></textarea>
                        <button @click="submit()" class="mt-2 bg-gray-600 hover:bg-gray-700 active:bg-gray-600 text-white w-full transition ease-in duration-200 text-center text-base font-semibold shadow-md rounded-lg py-2">
                            Save
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>

</div>
</template>