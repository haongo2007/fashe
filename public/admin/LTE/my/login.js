jQuery(document).ready(function($) {
		/* custom login admin */

		$.ajaxSetup({
		  beforeSend: function(xhr, settings) {
		    if (settings.data.indexOf('csrf_test_name') === -1) {
		      settings.data += '&csrf_test_name=' + encodeURIComponent(Cookies.get('csrf_cookie_name'));
		    }
		  }
		});

		// Questions Array
		var questions = [
		{ question: 'Enter Your Name' },
		{ question: 'Enter Your Password', type: 'password' }
		];

		// Transition Times
		var shakeTime = 100; // Shake Transition Time
		var switchTime = 200; // Transition Between Questions

		// Init Position At First Question
		var position = 0;

		// Init DOM Elements
		var formBox = $('#form-box');
		var nextBtn = $('#next-btn');
		var prevBtn = $('#prev-btn');
		var inputGroup = $('#input-group');
		var inputField = $('#input-field');
		var inputFieldPas = $('.input-field-P');
		var inputLabel = $('#input-label');
		var url = $('#input-label').attr('url');
		var inputProgress = $('#input-progress');
		var progress = $('#progress-bar');
		var redir = $('#redir').attr('data-re');
		// EVENTS

		// Next Button Click
		nextBtn.click(function(event) {
			validate();
		});

		prevBtn.click(function(event) {
			back();
		});

		// Input Field Enter Click
		inputField.keyup(function(event) {
		var keycode = (event.keyCode ? event.keyCode : event.which);
		if (keycode == 13) {
			validate();
		}
		});

		// FUNCTIONS

		// Get Question From Array & Add To Markup
		function getQuestion() {
		// Get Current Question
		inputLabel.html(questions[position].question);
		// Get Current Type
		inputField.prop('type', questions[position].type || 'text');
		// Get Current Answer
		inputField.val(questions[position].answer || '') ;
		// Focus On Element
		inputField.focus();

		// Set Progress Bar Width - Variable to the questions length
		progress.css('width', (position * 100) / questions.length + '%');

		// Add User Icon OR Back Arrow Depending On Question
		prevBtn.addClass(position ? 'fa fa-arrow-left' : 'fa fa-user');

		showQuestion();
		}

		// Display Question To User
		function showQuestion() {
		inputGroup.css('opacity', 1);
		inputProgress.css('transition', '');
		inputProgress.css('width', '100%');
		}

		// Hide Question From User
		function hideQuestion() {
		inputGroup.css('opacity', 0);
		inputLabel.css('marginLeft', 0);
		inputProgress.css('width', 0);
		inputProgress.css('transition','none');
		inputGroup.css('border', null);
		}

		// Transform To Create Shake Motion
		function transform(x, y) {
		formBox.css('transform',`translate(${x}px, ${y}px)`);
		}
		// back
		function back(){
			formBox.addClass('');
			inputField.removeClass('inputFieldPas');
			prevBtn.removeClass(position ? 'fa fa-arrow-left' : 'fa fa-user');
			setTimeout(transform, shakeTime * 0, 0, 10);
			setTimeout(transform, shakeTime * 1, 0, 0);
			// Store Answer In Array
			questions[position].answer = inputField.value;

			// Increment Position
			position--;
			var x = inputField.attr('name');
			// If New Question, Hide Current and Get Next
			if (questions[position]) {
				hideQuestion();
				formBox.removeClass('error');
				getQuestion();
			} else {
				// Remove If No More Questions
				hideQuestion();
				formBox.addClass('close');
				progress.css('width', '100%');
				// Form Complete

			}
			

			
		}

		// Validate Field
		function validate() {
		// Make Sure Pattern Matches If There Is One
			if (!inputField.val().match(questions[position].pattern || /.+/)) {
			inputFail();
			} else {
			
				if (!inputField.hasClass('inputFieldPas')) {
					na = inputField.val();
					$.ajax({
						url: url,
						type: 'post',
						data: 'n='+na,
						async:true,
						success: function(xml, textStatus, xhr) {
							
				            if(xhr.status == '200'){
				            	if (xml == 'fail') {
				            		inputFail();
				            	}else{
				            		inputPass();
				            		inputField.addClass('inputFieldPas');
				            		inputField.attr('name', xml);
				            	}
				                
				            }
				            else{
				                inputFail();
				            } 
						}
					});
				}
				else{
					
					na = inputField.attr('name');
					pa = inputField.val();
					$.ajax({
						url: url,
						type: 'post',
						data: 'us='+na+'&pa='+pa,
						async:true,
						success: function(xml, textStatus, xhr) {
							
				            if(xhr.status == '200'){
				            	if (xml == 'fail') {
				            		inputFail();
				            	}else{
				            		inputPass();
				            		setTimeout(function() {
									  window.location.href = redir+"admin/home";
									}, 1000);
				            		
				            	}
				            }
				            else{
				                inputFail();
				            } 
						}
					});
					
				}
			
			
			}
		}

		// Field Input Fail
		function inputFail() {
		formBox.addClass('error');
		// Repeat Shake Motion -  Set i to number of shakes
		for (let i = 0; i < 6; i++) {
		setTimeout(transform, shakeTime * i, ((i % 2) * 2 - 1) * 20, 0);
		setTimeout(transform, shakeTime * 6, 0, 0);
		inputField.focus();
		}
		}

		// Field Input Passed
		function inputPass() {
		formBox.addClass('');
		setTimeout(transform, shakeTime * 0, 0, 10);
		setTimeout(transform, shakeTime * 1, 0, 0);

		// Store Answer In Array
		questions[position].answer = inputField.value;

		// Increment Position
		position++;

		// If New Question, Hide Current and Get Next
		if (questions[position]) {
			hideQuestion();
			formBox.removeClass('error');
			getQuestion();
		} else {
			// Remove If No More Questions
			hideQuestion();
			progress.css('width', '100%');
			formBox.slideUp('slow');			
			// Form Complete

		}
		}

		
		// Get Question On DOM Load

		getQuestion();

	});