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
			
		}),
		computed: {
			...mapStores(useAuthStore, usePostsStore),	
		},
		mounted() {
            
            this.getViews();
            
            this.postsStore.get()
            //this.authStore.getUser();
		},
		methods: {
			
            getViews() {
                axios.get('/api/view/home')
                    .then(res => {
                        this.views = res.data;
                    })
            },
		}
	});

</script>

<template>
 
   
    <div class="container mx-auto py-10 px-5">
        <div class="max-w-5xl mx-auto bg-white rounded-lg shadow-md overflow-hidden rounded-2xl border-4 border-gray-400">
            <div class="p-4 sm:p-6">
                <!-- Title -->
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
                    <div class="flex row items-center mx-4"><img class="mx-2" width="24" src="images/eye.png" alt="">1</div>
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

            <section class="w-fit mx-auto grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 justify-items-center justify-center gap-y-20 gap-x-14 mt-10 mb-5">

                <div class="w-72 bg-white shadow-md rounded-xl duration-500 hover:scale-105 hover:shadow-xl" v-for="post in postsStore.posts" :key="post.id">
                    <a href="#">
                        <img src="https://images.unsplash.com/photo-1646753522408-077ef9839300?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwcm9maWxlLXBhZ2V8NjZ8fHxlbnwwfHx8fA%3D%3D&auto=format&fit=crop&w=500&q=60"
                                alt="Product" class="h-80 w-72 object-cover rounded-t-xl" />
                        <div class="px-4 py-3 w-72">
                            <span class="text-gray-400 mr-3 uppercase text-xs">Brand</span>
                            <p class="text-lg font-bold text-black truncate block capitalize">{{ post.text }}</p>
                            <div class="flex items-center">
                                <p class="text-lg font-semibold text-black cursor-auto my-3">$149</p>
                                <del>
                                    <p class="text-sm text-gray-600 cursor-auto ml-2">$199</p>
                                </del>
                                <div class="ml-auto"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20"
                                        fill="currentColor" class="bi bi-bag-plus" viewBox="0 0 16 16">
                                        <path fill-rule="evenodd"
                                            d="M8 7.5a.5.5 0 0 1 .5.5v1.5H10a.5.5 0 0 1 0 1H8.5V12a.5.5 0 0 1-1 0v-1.5H6a.5.5 0 0 1 0-1h1.5V8a.5.5 0 0 1 .5-.5z" />
                                        <path
                                            d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1zm3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4h-3.5zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1V5z" />
                                    </svg></div>
                            </div>
                        </div>
                    </a>
                </div>
                
            </section>
        
        </div>
    </div>
</template>

<style>

  
</style>