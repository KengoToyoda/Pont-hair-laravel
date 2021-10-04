<script>
import '@fullcalendar/core/vdom' // solves problem with Vite
import FullCalendar from '@fullcalendar/vue'
import dayGridPlugin from '@fullcalendar/daygrid'
import timeGridPlugin from '@fullcalendar/timegrid'
import interactionPlugin from '@fullcalendar/interaction'
import axios from 'axios'
import { mapGetters, mapActions } from 'vuex'

export default {
  components: {
    FullCalendar // make the <FullCalendar> tag available
  },
  computed: {
    ...mapGetters(['events']),
    config () {
        return {
          ... this.calendarOptions,
        }
      },
    calendarOptions() {
      return {
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
      }
    },
  },
  methods:{
    // addEvent: function() {
    //   axios.post('/calendar/store', this.newEvent,)
    //   .then((response) => {
    //     console.log("post success");
    //     console.log(response);
    //   }).catch((error) =>{
    //     console.log('post failed');
    //   });
    // },
    ...mapActions('events',['fetchEvents'])
  },
}
</script>

<template>
  <div>

  <FullCalendar :options="config" />
  </div>
</template>
