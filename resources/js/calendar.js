(function(){
	let app = {
		init: function(appointments) {
            this.appointments = appointments;
			this.data = {
				"template": [
					"<div class = 'clickad-dpck-wrapper'>",
						"<div class = 'clickad-dpck-picker'>",
							"<div class = 'clickad-dpck-header'>",
								"<button class = 'oi oi-caret-left'></button>",
								"<div class = 'clickad-dpck-header-title'>",
									"<span class = 'clickad-dpck-month'>",
										"<input type = 'hidden' id = 'clickad-dpck-month-value'>",
									"</span>",
									"<span class = 'clickad-dpck-year'>",
										"<input type = 'hidden' id = 'clickad-dpck-year-value'>",
									"</span>",
								"</div>",
								"<button class = 'oi oi-caret-right'></button>",
							"</div>",
							"<div class = 'clickad-dpck-body'>",
								"<div class = 'clickad-dpck-years'>",
									"<span class = 'oi oi-caret-left'></span>",
									"<div class = 'clickad-dpck-years-list'>",
									"</div>",
									"<span class = 'oi oi-caret-right'></span>",
								"</div>",
								"<div class = 'clickad-dpck-days'>",
									"<table class = 'clickad-dpck-table'>",
										"<thead>",
											"<tr>",
												"<td>Su</td>",
												"<td>Mo</td>",
												"<td>Tu</td>",
												"<td>We</td>",
												"<td>Th</td>",
												"<td>Fr</td>",
												"<td>Sa</td>",
											"<tr>",
										"</thead>",
										"<tbody class = 'clickad-dpck-table-body'>",
										"<tr class = 'clickad-dpck-day'></tr>",
										"<tr class = 'clickad-dpck-day'></tr>",
										"<tr class = 'clickad-dpck-day'></tr>",
										"<tr class = 'clickad-dpck-day'></tr>",
										"<tr class = 'clickad-dpck-day'></tr>",
										"<tr class = 'clickad-dpck-day'></tr>",
										"</tbody>",
									"</table>",
								"</div>",
								"<div class = 'clickad-dpck-dates'>",
								"</div>",
							"</div>",
						"</div>",
					"</div>"
				],
				"monthNames": ["January", "February", "March", "April", "May", "June", "July", "August", "September", "October", "November", "December"],
				"dayNames": ["Su", "Mo", "Tu", "We", "Th", "Fr", "Sa"],
				"min": 80,
				"max": 10
			}

			this.date = new Date();
			this.year = this.date.getFullYear();
			this.month = this.date.getMonth();
			this.dayDate = this.date.getDate();

			this.minDate = new Date(this.date.getFullYear() - this.data.min, '11', '01');
			this.maxDate = new Date(this.date.getFullYear() + this.data.max, '11', '01');
			this.minYear = this.minDate.getFullYear();
			this.maxYear = this.maxDate.getFullYear();

			this.pickedtMonth = "";
			this.pickedYear = "";
			this.pickedDate = "";
			this.page = 1;
			this.start = 0;

			this.$document = $(document);
			this.$container = $("#clickad-dpck");
			this.$container.append(this.data.template.join(""));

			this.$icon = $(".clickad-dpck-c-icon");
			this.$dpck =$(".clickad-dpck-picker");

			this.$month = $(".clickad-dpck-month");
			this.$monthValue = $("#clickad-dpck-month-value");
			this.$monthValue.val(this.month);

			this.$year = $(".clickad-dpck-year");
			this.$yearValue = $("#clickad-dpck-year-value");
			this.$yearValue.val(this.year);

			this.$left = $(".clickad-dpck-header .oi-caret-left");
			this.$right = $(".clickad-dpck-header .oi-caret-right");
			this.createPicker();

			this.$tableBody = $(".clickad-dpck-table-body");
			this.$tableBodyDay = $(".clickad-dpck-day");
			this.$years = $(".clickad-dpck-header-title");
			this.$yearBody = $(".clickad-dpck-years");
			this.$yearsList = $(".clickad-dpck-years-list");
			this.$leftY = $(".clickad-dpck-years .oi-caret-left");
			this.$rightY = $(".clickad-dpck-years .oi-caret-right");

			this.getDays(this.month, this.year, this.appointments);

			this.$left.on("click", this.changeMonth.bind(this, "left"));
			this.$right.on("click", this.changeMonth.bind(this, "right"));

			this.$tableBodyDayTd = $(".clickad-dpck-day-td");
			let self = this;

			this.$icon.on("click", function() {self.$dpck.fadeToggle(); self.$yearBody.fadeOut()});
			this.$years.on("click", function() {self.$yearBody.fadeToggle()});
			this.$years.on("click", this.getYears.bind(this, "null"));
			this.$leftY.on("click", this.getYears.bind(this, "left"));
			this.$rightY.on("click", this.getYears.bind(this, "right"));
			this.$tableBodyDayTd.on("click", this.pickDate.bind(this));
			this.markCurrentDate();

		},
		createPicker: function() {
			this.$month.html(this.data.monthNames[this.month]);
			this.$year.html(" " + this.year);
		},
		markCurrentDate: function() {
			let self = this;
			let currentMonth = parseInt(this.$monthValue.val());
			let currentYear = parseInt(this.$yearValue.val());
			$(".clickad-dpck-day-td").toArray().forEach(function(day){
				if(parseInt(self.dayDate) === parseInt($(day).text()) &&
				   currentYear === parseInt(self.year) &&
				   currentMonth === parseInt(self.month)){
					$(day).addClass("clickad-dpck-current-day");
				}
			})
		},
		rememberDate: function(event) {
			this.pickedtMonth = parseInt(this.$monthValue.val());
			this.pickedYear = parseInt(this.$yearValue.val());
			this.pickedDate = $(event.target).text();

		},
		markRememberedDate: function() {
			let self = this;
			let currentMonth = parseInt(this.$monthValue.val());
			let currentYear = parseInt(this.$yearValue.val());
			$(".clickad-dpck-day-td").toArray().forEach(function(day){
				if(parseInt(self.pickedDate) === parseInt($(day).text()) &&
				   currentYear === parseInt(self.pickedYear) &&
				   currentMonth === parseInt(self.pickedtMonth)){
					$(day).addClass("clickad-dpck-selected");
				}
			})
		},
		changeMonth: function(type) {
			this.$yearBody.fadeOut();
			let currentMonth = parseInt(this.$monthValue.val());
			let currentYear = parseInt(this.$yearValue.val());
			let m, y;
			if(type === "left"){
				currentMonth > 0 ? m = (currentMonth - 1) : m = 11;
				currentMonth > 0 ? y = currentYear : y = currentYear - 1;
			} else {
				currentMonth < 11 ? m = (currentMonth + 1) : m = 0;
				currentMonth < 11 ? y = currentYear : y = currentYear + 1;
			}
			this.$monthValue.val(m);
			this.$yearValue.val(y);
			this.$month.html(this.data.monthNames[m]);
			this.$year.html(" " + y);
			this.getDays(m, y, this.appointments);
			$(".clickad-dpck-day-td").on("click", this.pickDate.bind(this));
			this.markCurrentDate();
			this.markRememberedDate();
		},
		changeYear: function(event) {
			let m = parseInt(this.$monthValue.val());
			let y = parseInt($(event.target).text());
			this.$yearValue.val(y);
			this.$year.html(" " + y);
			this.getDays(m, y, this.appointments);
			this.$yearBody.fadeOut();
			$(".clickad-dpck-day-td").on("click", this.pickDate.bind(this));
			this.markCurrentDate();
			this.markRememberedDate();
		},
		getDaysInMonth: function(month,year) {
			return new Date(year, month+1, 0).getDate();
        },
        renderAppointment: function(i, num, month, year, appointments){
            let d = (month < 10 ? "0"+month : month) +"-"+(i < 10 ? "0"+i : i)+"-"+year;
            let token = $('meta[name="csrf-token"]').attr('content');
            let isAppointment = false;
            console.log(appointments);
            let appointment = {};
                appointments.forEach(a => {
                    if(a.date == d){
                        isAppointment = true;
                        appointment = a;
                    }
                 });
                 isAppointment == true ?
                 $(this.$tableBodyDay[num]).append(
                    `<td class = 'clickad-dpck-day-td'>
                       <span class='month-day'>${i}</span>
                       <div class="d-flex flex-column">
                            ${appointment.time == null || appointment.time == "" ? "" : "<span class='oi oi-clock'></span><span class='font-weight-bold'> "+appointment.time+"</span>"}
                            <span>${appointment.description}</span>
                       </div>
                       <div class="d-inline-block">
                           <form action = "calendar/${appointment.id}" method = 'POST'>
                               <input type="hidden" name="_token" value="${token}">
                               <input type="hidden" name="_method" value="DELETE" />
                               <div class="appointment-btn-wrapper">
                                    <button type='button'
                                        class='btn btn-default appointment-btn'
                                        data-toggle='modal'
                                        data-target='#confirmModal'
                                        data-type='Appointment'>
                                        <span class="oi oi-trash"></span>
                                    </button>
                                    <button type='button'
                                        class='btn btn-default appointment-btn'
                                        data-toggle='modal'
                                        data-target='#appointmentEditModal'
                                        data-id=${appointment.id}
                                        data-time=${appointment.time}
                                        data-description=${appointment.description}>
                                        <span class="oi oi-pencil"></span>
                                    </button>
                                </div>
                           </form>
                       </div>
                   </td>`
                )
                :
                $(this.$tableBodyDay[num]).append(
                    `<td class = 'clickad-dpck-day-td' data-toggle='modal' data-target='#calendarModal' data-date="${d}">
                        <span class='month-day'>${i}</span>
                        <span class="oi oi-plus add-appointment-icon"></span>
                    </td>`
                );
        },
		getDays: function(month, year, appointments){
			let mNum = this.getDaysInMonth(month,year);
			let d = new Date(year, month, '01');
            let startDay = d.getDay();
			this.$tableBodyDay.html("");
			for(let i = 0; i <= startDay-1; i++){
				$(this.$tableBodyDay[0]).append(
                    `<td class = 'clickad-dpck-disabled'></td>`
                );
			}
			for(let i = 1; i <= 7-startDay; i++){
                this.renderAppointment(i, 0, month, year, appointments);
			}
			for(let i = 8-startDay; i <= 14-startDay; i++){
                this.renderAppointment(i, 1, month, year, appointments);
			}
			for(let i = 15-startDay; i <= 21-startDay; i++){
                this.renderAppointment(i, 2, month, year, appointments);
			}
			for(let i = 22-startDay; i <= 28-startDay; i++){
                this.renderAppointment(i, 3, month, year, appointments);
			}
			if((startDay === 5 && mNum === 31) || (startDay === 6 && mNum === 30)){
				for(let i = 29-startDay; i <= mNum - 1; i++){
                    this.renderAppointment(i, 4, month, year, appointments);
				}
			} else if(startDay === 6 && mNum === 31){
				for(let i = 29-startDay; i <= mNum - 2; i++){
                    this.renderAppointment(i, 4, month, year, appointments);
				}
			} else {
				for(let i = 29-startDay; i <= mNum; i++){
                    this.renderAppointment(i, 4, month, year, appointments);
				}
			}
			for(let i = 36-startDay; i <= mNum; i++){
                this.renderAppointment(i, 5, month, year, appointments);
			}
		},
		getYears: function(type) {
			this.$yearsList.html("");
			let pages = Math.ceil((this.data.min + this.data.max)/28);
			let left = (this.data.min + this.data.max)%28;
			if(type === "left" && this.page != 1) {
				this.page--;
				this.start--;
			} else if(type === "right" && this.page != pages)  {
				this.page++;
				this.start++;
			}
			if(this.page === pages){
				for(let i = ((this.minYear) + (28 * this.start)); i <= ((this.minYear) + (28 * this.start) + left); i++){
					this.$yearsList.append(
                        `<button class = 'clickad-dpck-year-button'>${i}</button>`
                    );
				}
			} else{
				for(let i = ((this.minYear) + (28 * this.start)); i <= ((this.minYear) + (28 * this.page))-1; i++){
					this.$yearsList.append(
                        `<button class = 'clickad-dpck-year-button'>${i}</button>`
                    );
				}
			}
			$(".clickad-dpck-year-button").on("click", this.changeYear.bind(this));
		},
		pickDate: function(event) {
			//$(".clickad-dpck-day td").removeClass("clickad-dpck-selected");
			//$(event.target).addClass("clickad-dpck-selected");
			let m = parseInt(this.$monthValue.val())+1;
			let y = parseInt(this.$yearValue.val());
			let d = parseInt($(event.target).text());
			if(m < 10) m = "0" + m;
			if(d < 10) d = "0" + d;
			// this.$input.val(m+"/"+d+"/"+y);
			//this.$dpck.fadeToggle();
			this.rememberDate(event);
		},
		closePicker: function(event) {
			let input = $(event.target).closest(".clickad-dpck-input");
			let picker = $(event.target).closest(".clickad-dpck-picker");
			if (!input.length && !picker.length && this.$dpck.is(':visible')) {
				this.$dpck.fadeOut();
				this.$yearBody.fadeOut();
			}
		},
    }
    $(document).ready(() => {
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.post( "calendar/getApointments", ( data ) => {
            app.init(data)
          });
    });
})()
