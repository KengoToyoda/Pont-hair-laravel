import axios from 'axios';

//一元管理するデータの状態
const state = {
    events: []
};

//stateを更新
const getters = {
    events: state => state.events
}

//stateを更新する(同期)
const mutations = {
    setEvents(state, events) {
        state.events = events;
    }
}
//データの加工や、WebAPI呼び出しを行う(非同期）
const actions = {
    async fetchEvents({ commit }) {
        axios.get('/calendar/load')
        .then((response) => {
            commit('setEvents', response.data);
            alert(response.data);
        })
    }
    
}

export default {
    namespaced: true,
    state,
    getters,
    mutations,
    actions
};
