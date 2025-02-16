<script setup>
import { onMounted } from "vue";
import { useAuthStore } from "@/stores/auth";

const authStore = useAuthStore();

onMounted(async () => {
  await authStore.getUser();
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
                <div class="my-3 flex items-center justify-between text-sm">
                  <div>
                      Download pdf
                  </div>
                  <div class="flex row">
                    <div class="flex row items-center mx-4"><img width="24" src="images/eye.png" alt="">: 1</div>
                    <div class="flex row items-center"><img width="24" src="images/group.png" alt="">: 1</div>
                  </div>
                </div>
                <!-- Summary -->
                <hr class="my-4">
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
    </div>
      <p class="leading-relaxed text-xl text-gray-900 mt-8">
          We use VeilMail.io to <a class="font-medium text-blue-600 dark:text-blue-500 hover:underline" href="https://veilmail.io">hide email address from spammers</a>
      </p>
</template>

<style>

  
</style>