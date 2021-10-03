<script>
import '@fullcalendar/core/vdom' // solves problem with Vite
import FullCalendar from '@fullcalendar/vue'
import dayGridPlugin from '@fullcalendar/daygrid'
import timeGridPlugin from '@fullcalendar/timegrid'
import interactionPlugin from '@fullcalendar/interaction'
import axios from 'axios'

export default {
  components: {
    FullCalendar // make the <FullCalendar> tag available
  },
  data() {
    return {
      calendarOptions: {
         plugins: [
          dayGridPlugin,
          timeGridPlugin,
          interactionPlugin // needed for dateClick
        ],
        headerToolbar: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        locale: 'ja',
        displayEventTime: true, 
        nowIndicator:true,
        //日表示削除
        dayCellContent: function(e) {
              e.dayNumberText = e.dayNumberText.replace('日', '');
        },
        events: this.events,
        // googleCalendarApiKey: 'AIzaSyDSa_E8azO-9VskOmux9G2x71Cf4ZAn0uo',
        // events: 'ja.japanese#holiday@group.v.calendar.google.com',
        ventClick: function(arg) {
            window.open(arg.event.url, 'google-calendar-event', 'width=700,height=600');
            arg.jsEvent.preventDefault() 
        }
      },
      newEvent: {
        title: '',
        start: '',
        end: '',
        content: '',
        textColor:''
      },
    }
  },
  methods:{
    addEvent: function() {
      axios.post('/calendar/store', this.newEvent,)
      .then((response) => {
        console.log("post success");
        console.log(response);
      }).catch((error) =>{
        console.log('post failed');
      });
    },
  getEvents(){
    axios.get('/calendar/load')
    .then((response) => {
      this.calendarOptions.events = response.data;
      console.log(this.events);
    })
  }
  },
   mounted(){
      this.getEvents();
  }
}
</script>

<template>
  <div>
    <form @submit.prevent="addEvent">
      <label>タイトル</label>
      <input v-model="newEvent.title" type="text">
      <label>開始日時</label>
      <input v-model="newEvent.start" type="datetime-local">
      <label>終了日時</label>
      <input v-model="newEvent.end" type="datetime-local">
      <label>コメント</label>
      <input type="textarea"v-model="newEvent.content">
      <label>カラー</label>
      <input v-model="newEvent.textColor" type="color">
      <input type="submit" value="イベント作成">
    </form>
  <FullCalendar :options="calendarOptions" />
  </div>
</template>
