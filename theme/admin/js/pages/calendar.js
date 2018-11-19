$( document ).ready(function() {
    
		$('#calendar').fullCalendar({
			header: {
				left: 'prev,next today',
				center: 'title',
				right: 'year,month,agendaWeek,agendaDay'
			},
			defaultDate: false,
			editable: true,
			eventLimit: true,
			defaultDate: moment() 
		});

});