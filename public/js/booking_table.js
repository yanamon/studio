// //var lb = 1;
// //var ub = 10;
// //for (var i = lb; i <= ub; i++)
// //     $("#element" + i).css(*set your css here*);


// $(document).ready(function() {	

//     $(document).on('click','.unbooked', function() {
//     	var jam = this.id.split('jam')[1];
//     	var day = jam.charAt(0);
//     	var num = jam.slice(1);
//         var id_start = num;
//     	num++;
//     	var book_start = $(this).text();
//     	var table = $(this).closest("table");
//   		var date = $(table).attr("id");
//         var id_date = date.slice(-10);
// 		$(".book_day").val(date);
//         $("#book_day").val(id_date);
//     	$(".book_start").val(book_start);
// 		$("#book_start").val(id_start);
		
//     	$(".selected").addClass("unbooked");
//     	$(".suggestion").addClass("unbooked");
//     	$(".selected").removeClass("selected");
//     	$(".suggestion").removeClass("suggestion");
//     	$(this).addClass("selected"); 
//     	$(this).removeClass("unbooked"); 

//     	while($("#jam"+day+(num-1)).hasClass("unbooked")){
//     		$("#jam"+day+num).removeClass("unbooked");
//     		$("#jam"+day+num).addClass("suggestion");
//     		num++;
//     	}
//     });

//    $(document).on('click','.jam.selected', function() {
//     	$(".selected").addClass("unbooked");
//     	$(".suggestion").addClass("unbooked");
//     	$(".selected").removeClass("selected");
//     	$(".suggestion").removeClass("suggestion");  
//     });

//    $(document).on('click','[id^=jam].jam.suggestion', function() {
//    		var jam = this.id.split('jam')[1];
//     	var day = jam.charAt(0);
//     	var num = jam.slice(1);
//         var id_end = num;
//    		var book_end = $(this).text();
//     	$(".book_end").val(book_end);
//         $("#book_end").val(id_end);
//   		while($("#jam"+day+(num)).hasClass("suggestion")){
//     		$("#jam"+day+num).removeClass("suggestion");
//     		$("#jam"+day+num).addClass("selected");
//     		$("#sekat"+day+(num-1)).removeClass("suggestion");
//     		$("#sekat"+day+(num-1)).addClass("selected");
//     		num--;
//     	}
//     	$(".suggestion").addClass("unbooked");
//     	$(".suggestion").removeClass("suggestion");
//     	$('#booking_modal').modal('show');
//     });
   
//    $('.studio_select').change(function() {
//         this.form.submit();
//     });
// });