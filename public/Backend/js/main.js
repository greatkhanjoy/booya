// jQuery(document).ready(function($) {
//     "use strict";
// /*----------------------------
// 		 Auto Calculate
// 		------------------------------ */

// 		$('#shareqty').on('input', function() {
// 			var qty = $(this).val();
// 			var po1 = '100';
// 			var result = qty * po1;
// 		  	$('#sharevalue').val(result);
// 		});
// 		console.log(result);

// });


(function ($) {
 "use strict";

	 	/*----------------------------
		 Auto Calculate
		------------------------------ */

		$('#shareqty').on('input', function() {
			var qty = $(this).val();
			var po1 = '100';
			var result = qty * po1;
		  	$('#sharevalue').val(result);
		});
/*-------------------------------
Date Calculation
-------------------------------*/
$('#addps').on('keyup change paste', 'input, select, textarea', function(){

			var seque = document.getElementById('sequence');
			var sequence = seque.value;
			var date = document.getElementById('startdate');
			var startdate = date.value;
			var schem = document.getElementById('scheme');
			var scheme = schem.value;
			var start_after_days = document.getElementById('start_after_days');
			var startfrom = start_after_days.value;
			$.ajax({
	  			url:"check/checkuser.php",
	  			method: "POST",
	  			data:{startdate:startdate, sequence:sequence, scheme:scheme, startfrom:startfrom},
	  			dataType:"text",
	  			success:function(data){
	  				$('#enddate').val(data);

	  			}
	  		});
	});
/*-------------------------------
Date Calculation FDR
-------------------------------*/
$('#addfdr').on('keyup change paste', 'input, select, textarea', function(){

			var seque = document.getElementById('duration');
			var sequence = seque.value;
			var date = document.getElementById('startdate');
			var startdate = date.value;
			var schem = document.getElementById('scheme_type');
			var scheme = schem.value;
			$.ajax({
	  			url:"check/fdrexpiry.php",
	  			method: "POST",
	  			data:{startdate:startdate, sequence:sequence, scheme:scheme},
	  			dataType:"text",
	  			success:function(data){
	  				$('#enddate').val(data);

	  			}
	  		});
	});
// /*-------------------------------
// Date Calculation
// -------------------------------*/
// $('#addps').on('keyup change paste', 'input, select, textarea', function(){

// 			var seque = document.getElementById('sequence');
// 			var sequence = seque.value;
// 			var date = document.getElementById('startdate');
// 			var startdate = date.value;
// 			var schem = document.getElementById('scheme');
// 			var scheme = schem.value;
// 			$.ajax({
// 	  			url:"check/checkuser.php",
// 	  			method: "POST",
// 	  			data:{startdate:startdate, sequence:sequence, scheme:scheme},
// 	  			dataType:"text",
// 	  			success:function(data){
// 	  				$('#enddate').val(data);

// 	  			}
// 	  		});
// 	});

/*-------------------------------
Date Calculation2
-------------------------------*/
$('#addloan').on('keyup change paste', 'input, select, textarea', function(){

			var seque = document.getElementById('sequence');
			var sequence = seque.value;
			var date = document.getElementById('startdate');
			var startdate = date.value;
			var schem = document.getElementById('scheme');
			var scheme = schem.value;
			var start_after_days = document.getElementById('start_after_days');
			var startfrom = start_after_days.value;
			$.ajax({
	  			url:"check/checkdate.php",
	  			method: "POST",
	  			data:{startdate:startdate, sequence:sequence, scheme:scheme, startfrom:startfrom},
	  			dataType:"text",
	  			success:function(data){
	  				$('#enddate').val(data);

	  			}
	  		});
	});


/*-------------------------------
Date Calculation3
-------------------------------*/
$('#addloan').on('keyup change paste', 'input, select, textarea', function(){


			var date = document.getElementById('startdate');
			var startdate = date.value;
			var start_after_days = document.getElementById('start_after_days');
			var startfrom = start_after_days.value;
			$.ajax({
	  			url:"check/checkstart.php",
	  			method: "POST",
	  			data:{startdate:startdate, startfrom:startfrom},
	  			dataType:"text",
	  			success:function(data){
	  				$('#start_date').val(data);

	  			}
	  		});
	});


/*-------------------------------
Date Calculation4
-------------------------------*/
$('#addps').on('keyup change paste', 'input, select, textarea', function(){


			var date = document.getElementById('startdate');
			var startdate = date.value;
			var start_after_days = document.getElementById('start_after_days');
			var startfrom = start_after_days.value;
			$.ajax({
	  			url:"check/checkstart.php",
	  			method: "POST",
	  			data:{startdate:startdate, startfrom:startfrom},
	  			dataType:"text",
	  			success:function(data){
	  				$('#start_date').val(data);

	  			}
	  		});
	});


 /****************************
Show & Hide
 ****************************/

//  $('#question1c').change(function(){
//   if($(this).prop("checked")) {
// 		$('#question1').hide();
// 		$('#questionn1').show();
// 		$("#question1").prop('disabled', true);
// 		$("#questionn1").prop('disabled', false);
// 		console.log('Working');
//   } else {
//     $('#questionn1').hide();
// 		$('#question1').show();
// 		$("#questionn1").prop('disabled', true);
// 		$("#question1").prop('disabled', false);
//   }
// });
//
//
//  $('#question2c').change(function(){
//   if($(this).prop("checked")) {
// 		$('#question2').hide();
// 		$('#questionn2').show();
// 		$("#question2").prop('disabled', true);
// 		$("#questionn2").prop('disabled', false);
// 		console.log('Working');
//   } else {
//     $('#questionn2').hide();
// 		$('#question2').show();
// 		$("#questionn2").prop('disabled', true);
// 		$("#question2").prop('disabled', false);
//   }
// });
//
//
//
//  $('#question3c').change(function(){
//   if($(this).prop("checked")) {
// 		$('#question3').hide();
// 		$('#questionn3').show();
// 		$("#question3").prop('disabled', true);
// 		$("#questionn3").prop('disabled', false);
// 		console.log('Working');
//   } else {
//     $('#questionn3').hide();
// 		$('#question3').show();
// 		$("#questionn3").prop('disabled', true);
// 		$("#question3").prop('disabled', false);
//   }
// });
//
//  $('#question3c').change(function(){
//   if($(this).prop("checked")) {
// 		$('#question3').hide();
// 		$('#questionn3').show();
// 		$("#question3").prop('disabled', true);
// 		$("#questionn3").prop('disabled', false);
// 		console.log('Working');
//   } else {
//     $('#questionn3').hide();
// 		$('#question3').show();
// 		$("#questionn3").prop('disabled', true);
// 		$("#question3").prop('disabled', false);
//   }
// });
//
// $(function() {
//         var scntDiv = $('#p_scents');
//         var i = $('#p_scents p').size() + 1;
//
//         $('#addScnt').live('click', function() {
//                 $('<p><label for="p_scnts"><input type="text" id="p_scnt" size="20" name="p_scnt_' + i +'" value="" placeholder="Input Value" /></label> <a href="#" id="remScnt">Remove</a></p>').appendTo(scntDiv);
//                 i++;
//                 return false;
//         });
//
//         $('#remScnt').live('click', function() {
//                 if( i > 2 ) {
//                         $(this).parents('p').remove();
//                         i--;
//                 }
//                 return false;
//         });
// });
 /****************************
Show & Hide
 ****************************/

 $('#adduser').change(function(){
  if($(this).prop("checked")) {
    $('#depo').fadeIn()
  } else {
    $('#depo').fadeOut()
  }
});

/*-------------------------------
SCHEME
-------------------------------*/
		$('#scheme').on('change', function() {
			var scheme = $(this).val();
		$.ajax({
  			url:"check/check_scheme.php",
  			method: "POST",
  			data:{scheme:scheme},
  			dataType:"text",
  			success:function(data){
  				$('#instype').val(data);

  			}
  		});
		});
/*-------------------------------
SHOW  & HIDE
-------------------------------*/
		$('#lmethod').on('change', function() {
			var method = $(this).val();
			if(method == 1){
				$("#datewise").hide();
				$("#memberwise").hide();
				$("#lstart_date").prop('disabled', true);
				$("#lend_date").prop('disabled', true);
				$("#lmember_id").prop('disabled', true);
			}
			else if(method == 2){
				$("#datewise").show();
				$("#memberwise").hide();
				$("#lmember_id").prop('disabled', true);
				$("#lstart_date").prop('disabled', false);
				$("#lend_date").prop('disabled', false);
			}
			else if(method == 3){
				$("#memberwise").show();
				$("#datewise").hide();
				$("#lend_date").prop('disabled', true);
				$("#lstart_date").prop('disabled', true);
				$("#lmember_id").prop('disabled', false);
				$("#lmember_id").attr('disabled',false);
				$("#lmember_id").removeAttr('disabled');
			}
		});
/*-------------------------------
LOAN  Profit Per Ins
-------------------------------*/
	$('#addloan').on('keyup change paste', 'input, select, textarea', function(){

			        var interest = document.getElementById('interest');
			        var princiapl = interest.value;
			        var sequence = document.getElementById('sequence');
			        var seq = sequence.value;
			        var total = princiapl / seq;
                $("#profit_per_ins").val(total);
                    console.log(total);




		});
/*-------------------------------
LOAN  Principal Per Ins
-------------------------------*/
	$('#addloan').on('keyup change paste', 'input, select, textarea', function(){

			        var loan_amount = document.getElementById('loan_amount');
			        var princiapl = loan_amount.value;
			        var sequence = document.getElementById('sequence');
			        var seq = sequence.value;
			        var total = princiapl / seq;
                $("#principal_per_ins").val(total);
                console.log(total);



		});
/*-------------------------------
FDR INTEREST
-------------------------------*/
	$('#addfdr').on('keyup change paste', 'input, select, textarea', function(){

			        var percentage = document.getElementById('interest_percent');
			        var percent = percentage.value;
			        var fdramount = document.getElementById('fdr_amount');
			        var fdr_amount = fdramount.value;
			        var total = fdr_amount * percent / 100;
                $("#interest").val(total);




		});
/*-------------------------------
INTEREST
-------------------------------*/
	$('#addps').on('keyup change paste', 'input, select, textarea', function(){

			        var percentage = document.getElementById('interest_percent');
			        var percent = percentage.value;
			        var amount_per_ins = document.getElementById('amount_per_ins');
			        var amount_per = amount_per_ins.value;
			        var sequence = document.getElementById('sequence');
			        var sequen = sequence.value;
			        var tot = amount_per * sequen;
			        var total = tot * percent / 100;
                $("#interest").val(total);




		});
/*-------------------------------
INTEREST 2
-------------------------------*/
	$('#dpsw').on('keyup change paste', 'input, select, textarea', function(){

			        var received = document.getElementById('received');
			        var receive = received.value;
			        var interest_percent = document.getElementById('interest_percent');
			        var interestpercent = interest_percent.value;
			        var tot = receive * interestpercent / 100;
                    var total = (+tot) + (+receive);
                $("#interest").val(tot);
                $("#availble_to").val(total);




		});
/*-------------------------------
INTEREST 3
-------------------------------*/
	$('#addloan').on('keyup change paste', 'input, select, textarea', function(){

			        var interest_percent = document.getElementById('interest_percent');
			        var percent = interest_percent.value;
			        var loan_amount = document.getElementById('loan_amount');
			        var loan = loan_amount.value;
			        var total = loan * percent / 100;
                $("#interest").val(total);




		});
/*-------------------------------
INTEREST2
-------------------------------*/
	$('#addloan').on('keyup change paste', 'input, select, textarea', function(){
			        var loan_amount = document.getElementById('loan_amount');
			        var amount = loan_amount.value;
			        var interest_percent = document.getElementById('interest');
			        var interest = interest_percent.value;
			        var tot = (+amount) + (+interest);

                $("#total_loan").val(tot);




		});
/*-------------------------------
INSTALLMENT-NUMBER
-------------------------------*/
	$('#addloan').on('keyup change paste', 'input, select, textarea', function(){
			        var insnumber = document.getElementById('sequence');
			        var number = insnumber.value;
			        var total_loan = document.getElementById('total_loan');
			        var loan = total_loan.value;
			        var tot = loan / number;

                $("#amount_per_ins").val(tot);




		});
/*-------------------------------
tottal
-------------------------------*/
	$('#addps').on('keyup change paste', 'input, select, textarea', function(){

			        var percentage = document.getElementById('interest_percent');
			        var percent = percentage.value;
			        var amount_per_ins = document.getElementById('amount_per_ins');
			        var amount_per = amount_per_ins.value;
			        var sequence = document.getElementById('sequence');
			        var sequen = sequence.value;
			        var tot = amount_per * sequen;
			        var total = tot * percent / 100;
			        var atotal = total + tot;
                $("#total_amount").val(atotal);
                $("#total").val(tot);




		});



/*******************************


*******************************/




		$('#addmember').on('keyup change paste', 'input, select, textarea', function(){

		var sharevalue = document.getElementById('sharevalue');
		var por1 = sharevalue.value;
		var charge_amount = document.getElementById('charge_amount');
		var por2 = charge_amount.value;
		var admission_fee = document.getElementById('admission_fee');
		var por3 = admission_fee.value;
		var admission_form_fee = document.getElementById('admission_form_fee');
		var por4 = admission_form_fee.value;

		var result = (+por1) + (+por2) + (+por3) + (+por4);
		$('#feetotal').val(result);
	});

			$('#addsame').change(function() {
			    if(this.checked) {
			        var villa = document.getElementById('pr_village');
			        var village = villa.value;
			        var post = document.getElementById('pr_postal');
			        var postoffice = post.value;
			        var than = document.getElementById('pr_thana');
			        var thana = than.value;
			        var dist = document.getElementById('pr_district');
			        var district = dist.value;




                $("#pa_village").val(village);
                $("#pa_postal").val(postoffice);
                $("#pa_thana").val(thana);
                $("#pa_district").val(district);
                $( '#pa_village' ).prop( "readonly", true );
                $( '#pa_postal' ).prop( "readonly", true );
                $( '#pa_thana' ).prop( "readonly", true );
                $( '#pa_district' ).prop( "readonly", true );
			    }

			});
			$('#addsame').change(function() {
			    if(!this.checked) {
                $( '#pa_village' ).prop( "readonly", false );
                $( '#pa_postal' ).prop( "readonly", false );
                $( '#pa_thana' ).prop( "readonly", false );
                $( '#pa_district' ).prop( "readonly", false );
			    }

			});

		/*------------------------------------*/

		$(".chosen")[0] && $(".chosen").chosen({
            width: "100%",
            allow_single_deselect: !0
        });
		/*--------------------------
		 auto-size Active Class
		---------------------------- */
		$(".auto-size")[0] && autosize($(".auto-size"));
		/*--------------------------
		 Collapse Accordion Active Class
		---------------------------- */
		$(".collapse")[0] && ($(".collapse").on("show.bs.collapse", function(e) {
            $(this).closest(".panel").find(".panel-heading").addClass("active")
        }), $(".collapse").on("hide.bs.collapse", function(e) {
            $(this).closest(".panel").find(".panel-heading").removeClass("active")
        }), $(".collapse.in").each(function() {
            $(this).closest(".panel").find(".panel-heading").addClass("active")
        }));
		/*----------------------------
		 jQuery tooltip
		------------------------------ */
		$('[data-toggle="tooltip"]').tooltip();
		/*--------------------------
		 popover
		---------------------------- */
		$('[data-toggle="popover"]')[0] && $('[data-toggle="popover"]').popover();
		/*--------------------------
		 File Download
		---------------------------- */
		$('.btn.dw-al-ft').on('click', function(e) {
			e.preventDefault();
		});
		/*--------------------------
		 Sidebar Left
		---------------------------- */
		$('#sidebarCollapse').on('click', function () {
			 $('#sidebar').toggleClass('active');

		 });
		$('#sidebarCollapse').on('click', function () {
			$("body").toggleClass("mini-navbar");
			SmoothlyMenu();
		});
		$('.menu-switcher-pro').on('click', function () {
			var button = $(this).find('i.nk-indicator');
			button.toggleClass('notika-menu-befores').toggleClass('notika-menu-after');

		});
		$('.menu-switcher-pro.fullscreenbtn').on('click', function () {
			var button = $(this).find('i.nk-indicator');
			button.toggleClass('notika-back').toggleClass('notika-next-pro');
		});
		/*--------------------------
		 Button BTN Left
		---------------------------- */

		$(".nk-int-st")[0] && ($("body").on("focus", ".nk-int-st .form-control", function() {
            $(this).closest(".nk-int-st").addClass("nk-toggled")
        }), $("body").on("blur", ".form-control", function() {
            var p = $(this).closest(".form-group, .input-group"),
                i = p.find(".form-control").val();
            p.hasClass("fg-float") ? 0 == i.length && $(this).closest(".nk-int-st").removeClass("nk-toggled") : $(this).closest(".nk-int-st").removeClass("nk-toggled")
        })), $(".fg-float")[0] && $(".fg-float .form-control").each(function() {
            var i = $(this).val();
            0 == !i.length && $(this).closest(".nk-int-st").addClass("nk-toggled")
        });
		/*--------------------------
		 mCustomScrollbar
		---------------------------- */
		$(window).on("load",function(){
			$(".widgets-chat-scrollbar").mCustomScrollbar({
				setHeight:460,
				autoHideScrollbar: true,
				scrollbarPosition: "outside",
				theme:"light-1"
			});
			$(".notika-todo-scrollbar").mCustomScrollbar({
				setHeight:445,
				autoHideScrollbar: true,
				scrollbarPosition: "outside",
				theme:"light-1"
			});
			$(".comment-scrollbar").mCustomScrollbar({
				autoHideScrollbar: true,
				scrollbarPosition: "outside",
				theme:"light-1"
			});
		});



	/*----------------------------
	 jQuery MeanMenu
	------------------------------ */
	jQuery('nav#dropdown').meanmenu();

	/*----------------------------
	 wow js active
	------------------------------ */
	 new WOW().init();

	/*----------------------------
	 owl active
	------------------------------ */
	$("#owl-demo").owlCarousel({
      autoPlay: false,
	  slideSpeed:2000,
	  pagination:false,
	  navigation:true,
      items : 4,
	  /* transitionStyle : "fade", */    /* [This code for animation ] */
	  navigationText:["<i class='fa fa-angle-left'></i>","<i class='fa fa-angle-right'></i>"],
      itemsDesktop : [1199,4],
	  itemsDesktopSmall : [980,3],
	  itemsTablet: [768,2],
	  itemsMobile : [479,1],
	});

	/*----------------------------
	 price-slider active
	------------------------------ */
	  $( "#slider-range" ).slider({
	   range: true,
	   min: 40,
	   max: 600,
	   values: [ 60, 570 ],
	   slide: function( event, ui ) {
		$( "#amount" ).val( "£" + ui.values[ 0 ] + " - £" + ui.values[ 1 ] );
	   }
	  });
	  $( "#amount" ).val( "£" + $( "#slider-range" ).slider( "values", 0 ) +
	   " - £" + $( "#slider-range" ).slider( "values", 1 ) );

	/*--------------------------
	 scrollUp
	---------------------------- */
	$.scrollUp({
        scrollText: '<i class="fa fa-angle-up"></i>',
        easingType: 'linear',
        scrollSpeed: 900,
        animation: 'fade'
    });



})(jQuery);
