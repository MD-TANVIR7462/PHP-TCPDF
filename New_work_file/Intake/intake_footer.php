		</form>
	</div>

<script type="text/javascript">
$(document).ready(function () {
	
	$(function () {
		$('[data-toggle="tooltip"]').tooltip();
	});
	
	var current = 1,current_step,next_step,steps;
	steps = $("fieldset").length;
		
	$(".next").click(function () {
		parentClass 		= $(this).parent().parent().parent().attr("class");
		if(parentClass=="setpage"){
			current_step 	= $(this).parent().parent().parent();
			next_step 		= $(this).parent().parent().parent().next();
		} else {
			current_step 	= $(this).parent();
			next_step 		= $(this).parent().next();
		}
		
		next_step.show();
		current_step.hide();
		setProgressBar(++current);
	});
	$(".previous").click(function () {
		
		parentClass 		= $(this).parent().parent().parent().attr("class");
		if(parentClass=="setpage"){
			current_step 	= $(this).parent().parent().parent();
			next_step 		= $(this).parent().parent().parent().prev();
		} else {
			current_step 	= $(this).parent();
			next_step 		= $(this).parent().prev();
		}
		
		next_step.show();
		current_step.hide();
		setProgressBar(--current);
	});
	setProgressBar(current);
	// Change progress bar action
	function setProgressBar(curStep) {
		var percent = parseFloat(100 / steps) * curStep;
		percent = percent.toFixed();
		$(".progress-bar")
			.css("width", percent + "%")
			.html(percent + "%");
	}
});

function checkboxValue(input,output){
	inputValue = input.checked ? "Y" : "N";
	$('#'+output).val(inputValue);
}

function googleTranslateElementInit() {
    new google.translate.TranslateElement({
        pageLanguage: 'en',
        autoDisplay: 'true',
        includedLanguages : '<?php echo $transIncLan?>',
        layout: google.translate.TranslateElement.InlineLayout.HORIZONTAL
    }, 'google_translate_element');
}

$(document).on('submit', '#registration_form', function(event){
	event.preventDefault();
	$.ajax({
		url:"fetch.php?formNo=<?php echo $formNoEnc?>&<?php echo $getId?>",
		method:'POST',
		data:new FormData(this),
		contentType:false,
		processData:false,
		success:function(data){
			// alert(data);
			toastr.success(data);
			// console.log(data);
		}
	}); 
});

<?php if($expDateFormat!=""){?>
function countDownTimer(date) {
	var elem = $('#countDown');

	//$( "p" ).add( "div" ).addClass( "widget" );
	var futureTime = new Date(date).getTime();
	
	setInterval(function () {
		
		var currentDate = new Date(new Date().toLocaleString('en', {timeZone: 'America/New_York'}));
		
		// Time left between future and current time in Seconds
		var timeLeft = Math.floor((futureTime - currentDate.getTime()) / 1000);
		// console.log(timeLeft);

		// Days left = time left / Seconds per Day 
		var days = Math.floor(timeLeft / 86400);
		// console.log(days);

		// 86400 seconds per Day
		timeLeft -= days * 86400;
		// console.log(timeLeft);

		// Hours left = time left / Seconds per Hour
		var hours = Math.floor(timeLeft / 3600) % 24;
		// console.log(hours);

		// 3600 seconds per Hour
		timeLeft -= hours * 3600;
		// console.log(timeLeft);

		// Minutes left = time left / Minutes per Hour
		var min = Math.floor(timeLeft / 60) % 60;
		// console.log(min);

		// 60 seconds per minute
		timeLeft -= min * 60;
		// console.log(timeLeft);

		// Seconds Left
		var sec = timeLeft % 60;
		
		// "<span class='days'>" + days + " Days " + "</span>" +
		// Combined DAYS+HOURS+MIN+SEC
		
		if(days<=0 && hours<=0 && min<=0 && sec<=0) {
			setTimeout(function(){
				window.location.reload();
			}, 1500);
		}
		
		var timeDayString = timeHourString = timeMinuteString = "";
		if(days>0) timeDayString = "<span class='days'>" + days + " Days " + "</span>";
		if(hours>0) timeHourString = "<span class='hours'>" + hours + " Hours " + "</span>";
		if(min>0) timeMinuteString = "<span class='minutes'>" + min + " Minutes " + "</span>";
		
		var timeString = "Expiring on: " + timeDayString + timeHourString + timeMinuteString + 
						 "<span class='seconds'>" + sec + " Seconds " + "</span>";

		elem.html(timeString);
	}, 1000);
}

countDownTimer('<?php echo $expDateFormat?>');
<?php }?>
</script>
<script src='//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit'></script>
</body>
</html>