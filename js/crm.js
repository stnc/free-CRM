$(document).ready(function() {

$("span.filename").html("Henüz resim seçmediniz");
$("span.action").html("Gözat");

 $("#i_city").change(city);
 $("#adress_city").change(adress_city);
 $("#position_id").change(section);
 
 
$("#DataTables_Table_0_info").html("Adet sayfa");
$(".prev a").html("←  Önceki");
$(".next a").html("→  Sonraki");

  $('.accordion_mnu').initMenu();
/*===================
	LIST-ACCORDION
	===================*/	  

	$('#list-accordion').accordion({
		header: ".title",
		autoheight: false
	});
	
	

});

function city(){
		var selected = $("#i_city option:selected");		
		var id = "";
		if(selected.val() != 0){
			id =  selected.val();
		$.ajax({
type: "GET",
 url:"http://crm.dev/admin/ajax_controller/town_list/",
 data: "type="+id+"&func=taking",
success: function(sonuc) {
$("select#i_town").html(sonuc);
//$("#i_town_chzn .chzn-results").html(sonuc);
//$("#i_town").show();
}});
}}


function adress_city(){
		var selected = $("#adress_city option:selected");		
		var id = "";
		if(selected.val() != 0){
			id =  selected.val();
		$.ajax({
type: "GET",
 url:"http://crm.dev/admin/ajax_controller/town_list/",
 data: "type="+id+"&func=taking",
success: function(sonuc) {
$("select#adress_town").html(sonuc);
//$("#i_town_chzn .chzn-results").html(sonuc);
//$("#i_town").show();
}});
}}

function section(){
		var selected = $("#position_id option:selected");		
		var id = "";
		if(selected.val() != 0){
			id =  selected.val();
		$.ajax({
type: "GET",
 url:"http://crm.dev/admin/ajax_controller/section_list/",
 data: "type="+id+"&func=taking",
success: function(sonuc) {
$("select#section_id").html(sonuc);
//$("#i_town_chzn .chzn-results").html(sonuc);
//$("#i_town").show();
}});
}}

function show_confirm(vals)
{
var answer = confirm("Silmek istediğinize emin misiniz?")
	if (answer){
		window.location = "http://crm.dev/"+vals;
}}
 
function set_day_title(date) {
												
												var day = date.getDate();
														if(day < 10) day = "0"+day;
														
												var month = date.getMonth() + 1; //0 - 11
													if(month < 10) month = "0"+month;
												
												var year = date.getFullYear();
												var compare = year + "-" + month + "-" + day;
											
												var toolTip = compare;
											
												
											
												return new Array(true, "", toolTip);
												
											}

                                            $(function() {
												
												
												
												$.datepicker.regional["tr"] = {
													closeText: "kapat",
													prevText: "Geri",
													nextText: "İleri",
													currentText: "bugün",
													monthNames: ["Ocak","Şubat","Mart","Nisan","Mayıs","Haziran",
													"Temmuz","Ağustos","Eylül","Ekim","Kasım","Aralık"],
													monthNamesShort: ["Oca","Şub","Mar","Nis","May","Haz",
													"Tem","Ağu","Eyl","Eki","Kas","Ara"],
													dayNames: ["Pazar","Pazartesi","Salı","Çarşamba","Perşembe","Cuma","Cumartesi"],
													dayNamesShort: ["Pz","Pt","Sa","Ça","Pe","Cu","Ct"],
													dayNamesMin: ["Pz","Pt","Sa","Ça","Pe","Cu","Ct"],
													weekHeader: "Hf",
													dateFormat: "dd.mm.yy",
													firstDay: 1,
													isRTL: false,
													showMonthAfterYear: false,
													yearSuffix: ""};
	
													$.datepicker.setDefaults($.datepicker.regional["tr"]);
													
                                                $( "#date_start,#date_finish").datepicker({
													
													dateFormat: "yy-mm-dd",													
													beforeShowDay: set_day_title,
													
													
												});
												
                                            });
