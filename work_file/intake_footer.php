		</form>
	</div>

<script type="text/javascript">
$(document).ready(function () {
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
		url:"fetch.php?formNo=<?php echo $formNo?>&<?php echo $getId?>",
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
</script>
<script src='//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit'></script>
</body>
</html>