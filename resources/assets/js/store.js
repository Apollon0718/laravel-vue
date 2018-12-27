import Vue from 'vue'
import Vuex from 'vuex'

Vue.use(Vuex)

export default new Vuex.Store({
    state: {
        notes: []
    },
    mutations: {
        getNotes(state) {
            axios.get('/api/notes')
                .then(response => {
                    state.notes = response.data
                })
                .catch(response => {
                    console.log(response)
                });
        }
    },
    actions: {
        removeNote(context, data) {
            axios.delete('/api/notes/' + data.id)
                .then(response => {
                    this.commit('getNotes')
                })
                .catch(response => {
                    console.log(response)
                });
        },
        addNote(contex, data) {
            let formData = new FormData()
            formData.append('name', data.name)
            formData.append('content', data.content)
            formData.append('file', data.file)

            axios.post('/api/notes', formData)
                .then(response => {
                    this.commit('getNotes')
                })
                .catch(response => {
                    console.log(response)
                });
        },
        updateNote(contex, data) {
            axios.put('/api/notes/' + data.id, {name: data.name, content: data.content})
                .then(response => {
                    this.commit('getNotes')
                })
                .catch(response => {
                    console.log(response)
                });
        },
        addComment(context, data) {
            axios.post('/api/note/' + data.id + '/comments', {
                'author': data.comment_author,
                'content': data.comment_content
            })
                .then(response => {
                    this.commit('getNotes')
                })
                .catch(response => {
                    console.log(response)
                });
        }
    }
})