<script>
import '@fullcalendar/core/vdom' // solves problem with Vite
import FullCalendar from '@fullcalendar/vue'
import dayGridPlugin from '@fullcalendar/daygrid'
import timeGridPlugin from '@fullcalendar/timegrid'
import interactionPlugin, { Draggable } from '@fullcalendar/interaction'
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
          interactionPlugin
        ],
        headerToolbar: {
          left: 'prev,next today',
          center: 'title',
          right: 'dayGridMonth,timeGridWeek,timeGridDay'
        },
        locale: 'ja',
        displayEventTime: true, 
        nowIndicator:true,
        selectable: true,
        droppable: true,
        //日表示削除
        dayCellContent: function(e) {
              e.dayNumberText = e.dayNumberText.replace('日', '');
        },
<<<<<<< HEAD
        events: '/calendar/load',
        eventClick: function(info) {
          alert('Event: ' + info.event.title);
        },
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
        this.calendarOptions.events = response.data;
      }).catch((error) =>{
        console.log('post failed');
      });
    },
    // getEvent:function(){
    //   axios.get('/calendar/load')
    //   .then((response) =>{
    //     this.calendarOptions.events = response.data;
    //   })
    // },
    evntDrop: function(info) {
      data: {
      }
      axios.post('calendar/dropEvents')
    },
=======
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
>>>>>>> f1e730b0de206e5cf2c5283921e75b5bb8eb827b
  },
}
</script>

<template>
  <div>

  <FullCalendar :options="config" />
  </div>
</template>
