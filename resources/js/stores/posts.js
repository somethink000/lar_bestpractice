import { defineStore } from 'pinia'
import axios from "axios";


export const usePostsStore = defineStore('posts', {
   
    
    state: () => ({
        posts: [ ],
        current: null,
    }),

    
    actions: {
        
        async get() {
            axios.get('/api/post')
            .then(res => {
                this.posts = res.data;
                
            })
        },


        async create(form) {
            console.log("eef");
            return axios.post('/api/post', form, {
                headers: {
                    "Content-type": "application/json"
                }
            })
            .then(res => {
                
                var data = res.data;

                if (data) {
                    
                    this.posts.push(data);
                } 
            })  
        },

        async show(id) {
            axios.get('/api/post/'+id)
            .then(res => {
            
                this.current = res.data;
            })
        },
        

        async update(form) {

            axios.patch('/api/post/' + this.current.id, form, {
                headers: {
                    "Content-type": "application/json"
                }
            })
            .then(res => {
                if (res.data) {
                    this.current = res.data;
                    //динамическое обноление списка новостей чтобы не подгружать при переходе на главную
                    for (var i = 0; i < this.posts.length; i++) {

                        var obj = this.posts[i];
                        if (obj.id == this.current.id) {
                            this.posts[i] = res.data;
                        }
                    }
                }
            })
        },

        async delete() {
            
            axios.delete('/api/post/' + this.current.id)
            .then(res => {
                if (res) {
                    //удаление из масива чтобы не делать дополнительный запрос 
                    for (var i = 0; i < this.posts.length; i++) {

                        var obj = this.posts[i];
                    
                        if (obj.id == this.current.id) {
                            this.posts.splice(i, 1);
                        }
                    }

                    this.current = {}
                }
            })
        },
        
    },

    getters: {
       
    },
})