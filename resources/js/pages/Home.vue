<script>
    import { defineComponent } from 'vue';
    import { useAuthStore } from "@/stores/auth";
	import { mapStores } from 'pinia'

    import Posts from '@/components/Home/Posts.vue'
    import Stats from '@/components/Stats.vue';
    import axios from 'axios';

    

    export default defineComponent({ 
		components: {
            Posts,
            Stats,
		},
		data: () => ({
			views: 0,
			count: 0,
            jokes: {},
            users: {},
            
		}), 
		computed: {
			...mapStores(useAuthStore),	
		},
		mounted() {
            
            this.getViews();
            
            //this.authStore.getUser();

            //this.listen();

            axios.get('/api/joke')
            .then(res => {
                this.jokes = res.data;
                
            })


		},
		methods: {
			



            getViews() {
                axios.get('/api/views/home/'+1)
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
            <h2 class="text-2xl font-semibold">Views statistic example</h2>
            <hr class="mb-5">
            
            <div class="h-60">
                <Stats />
            </div>
            <!-- POSTS -->

            <h2 class="text-2xl font-semibold mt-20">Crud example</h2>
            <hr class="mb-5">
            <Posts/>
            

            {{ jokes }}
        </div>
    </div>
</template>

<style>

  
</style>