<script>
    import { defineComponent } from 'vue';
    import { useAuthStore } from "@/stores/auth";
    import { usePostsStore } from "@/stores/posts";
	import { mapActions, mapStores } from 'pinia'


    export default defineComponent({
		components: {

		},
		data: () => ({
			views: 0,
			count: 0,
            users: {},
		}),
		computed: {
			...mapStores(useAuthStore, usePostsStore),	
		},
		mounted() {
            
            this.getViews();
            
            this.postsStore.get()
            this.authStore.getUser();

            this.listen();
		},
		methods: {
			
            getViews() {
                axios.get('/api/view/home')
                    .then(res => {
                        this.views = res.data;
                    })
            },

            listen() {



                Echo.join('counter')
                    .here((users) => {
                        this.users = users;
                        this.count = users.length;
                        console.log("wdwd");
                    })
                    .joining((user) => {
                        this.users.push(user);
                        this.count++
                        
                    }) 
                    .leaving((user) => {
                        this.users.$remove(user);
                        this.count--
                    })
                    .error((error) => {
                        console.error(error);
                    });
                    
            }
		}
	});

</script>

<template>
 
   
    <div class="container mx-auto py-10 px-5">
        <div class="max-w-5xl mx-auto bg-white rounded-lg shadow-md overflow-hidden rounded-2xl border-4 border-gray-400">
            <div class="p-4 sm:p-6">
                <!-- Title -->
                <div v-if="authStore.user">
                    <a>{{ authStore.user.name }}</a>
                </div>
                <div class="flex items-center justify-between">
                    <div>
                        <h2 class="text-2xl font-semibold">Alexandr Zubkov</h2>
                        <p class="text-sm text-gray-600">Web Developer</p>
                    </div>
                    <div>
                        <p class="text-sm text-gray-600">Phone: 8 (980) 146-8035</p>
                        <p class="text-sm text-gray-600">Email: alexandrskipin1@yandex.ru</p>
                        <p class="text-sm text-gray-600">Location: Russia</p>
                    </div>
                </div>
                
                <!-- Summary -->
                <hr class="my-4">

                <div class=" flex items-center justify-between text-sm">
                  <div>
                      Download pdf
                  </div>
                  <div class="flex row">
                    <div class="flex row items-center mx-4"><img class="mx-2" width="24" src="images/eye.png" alt="">{{ this.count }}</div>
                    <div class="flex row items-center"><img class="mx-2" width="24" src="images/group.png" alt="">{{ views }}</div>
                  </div>
                </div>


                <div>
                    <h3 class="text-lg font-semibold mb-2">Summary</h3>
                    <p class="text-sm leading-relaxed">Results-oriented Senior Software Engineer with 20 years of experience
                        designing, developing, and deploying complex software solutions. Proficient in a variety of
                        programming languages and technologies. Proven track record of leading teams and delivering
                        high-quality products.</p>
                </div>
                <!-- Skills -->
                <div class="mt-4">
                    <h3 class="text-lg font-semibold mb-2">Skills</h3>
                    <ul class="list-disc list-inside text-sm">
                        <li>Programming Languages: Java, Python, JavaScript</li>
                        <li>Frameworks & Libraries: Spring Boot, React, Angular</li>
                        <li>Database Systems: MySQL, PostgreSQL, MongoDB</li>
                        <li>Cloud Technologies: AWS, Azure, Google Cloud Platform</li>
                        <li>Agile Methodologies: Scrum, Kanban</li>
                        <li>DevOps Tools: Docker, Kubernetes, Jenkins</li>
                    </ul>
                </div>
                <!-- Experience -->
                <div class="mt-4">
                    <h3 class="text-lg font-semibold mb-2">Experience</h3>
                    <div>
                        <h4 class="text-md font-semibold">Cetera</h4>
                        <p class="text-sm text-gray-600"></p>
                        <ul class="list-disc list-inside text-sm">
                            <li>Lead a team of developers in designing and implementing a scalable microservices
                                architecture.</li>
                            <li>Developed and maintained critical components of the company's flagship product, resulting
                                in increased reliability and performance.</li>
                            <li>Collaborated with product managers to define project requirements and timelines.</li>
                        </ul>
                    </div>
                    <!-- <div class="mt-4">
                        <h4 class="text-md font-semibold">XYZ Tech</h4>
                        <p class="text-sm text-gray-600">Software Engineer | 2008 - 2015</p>
                        <ul class="list-disc list-inside text-sm">
                            <li>Contributed to the development of a cutting-edge mobile application, used by millions of
                                users worldwide.</li>
                            <li>Implemented continuous integration and deployment pipelines, improving team efficiency
                                and product quality.</li>
                            <li>Mentored junior engineers and conducted code reviews to ensure adherence to best
                                practices.</li>
                        </ul>
                    </div> -->
                </div>
            </div>
        </div>

        <div class="max-w-5xl mx-auto bg-white rounded-lg shadow-md overflow-hidden rounded-2xl border-4 border-gray-400 my-20 py-10 px-5">

            <!-- Views Stats -->



            <!-- POSTS -->

            Crud example
            <div class="max-w-screen-xl mx-auto p-5 sm:p-10 md:p-16">

                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10">


                    <div class="rounded overflow-hidden shadow-lg flex flex-col" v-for="post in postsStore.posts" :key="post.id">
                        <a href="#"></a>
                        <div class="relative"><a href="#">
                                <img class="w-full"
                                    src="https://images.pexels.com/photos/61180/pexels-photo-61180.jpeg?auto=compress&amp;cs=tinysrgb&amp;dpr=1&amp;w=500"
                                    alt="Sunset in the mountains">
                                <div
                                    class="hover:bg-transparent transition duration-300 absolute bottom-0 top-0 right-0 left-0 bg-gray-900 opacity-25">
                                </div>
                            </a>
                            <a href="#!">
                                <div
                                    class="text-xs absolute top-0 right-0 bg-indigo-600 px-4 py-2 text-white mt-3 mr-3 hover:bg-white hover:text-indigo-600 transition duration-500 ease-in-out">
                                    Cooking
                                </div>
                            </a>
                        </div>
                        <div class="px-6 py-4 mb-auto">
                            <a href="#"
                                class="font-medium text-lg inline-block hover:text-indigo-600 transition duration-500 ease-in-out inline-block mb-2">Simplest
                                Salad Recipe ever</a>
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
                                <span class="ml-1">6 mins ago</span>
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
        </div>
    </div>
</template>

<style>

  
</style>