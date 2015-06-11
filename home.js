$(document).ready(function() {
	/* get new event from form *
	var events = {};
	events.title = document.getElementsByName("event")[0];
	events.start = document.getElementsByName("start");
	events.end = document.getElementsByName("end");

	/* array to hold all events *
	var allevents = [];
	allevents.push(events);
	for(var i = 0; i < allevents.length; i++) {
		console.log(allevents[i].);
	}
	/* set up all features for the calendar */
	$('#calendar').fullCalendar( {
		header: {
			/* add buttons to switch between views */
			center: 'month, agendaWeek, agendaDay'
		},
		/* make height of calendar smaller */
		aspectRatio: 1.75,
		/* allow window to resize calendar */
		windowResize: true,

		/* add the events to the calendar */
	//	events: allevents
	});

	/* show endtime for add event if box is not checked */
	$('#checkbox').click(function () {
		if($('#checkbox').is(':checked')) {
			$('#endtime').attr('disabled', 'disabled');
		}
		else {
			$('#endtime').removeAttr('disabled');
		}
	});
});
