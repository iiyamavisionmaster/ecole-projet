/*view loader*/
function loadViews(openParameter={ temp: null }){ 
	var dataReturn;
	var openParameterSerialize= JSON.stringify(openParameter);
	$.post({
		url : '../controller/loadView.php',  
		dataType: "text",
		async: false,
		data: {openParameter:openParameterSerialize},
		success : function(data, statut){

			dataReturn=data; 
		},
		error : function(result, statut, error){
			console.log(error);
		}
	});
	return dataReturn;
};


/*get Database Content*/
function getDatabaseContent(  openParameter){

	openParameter['dataBase'] = openParameter['thisObj'].text(); 
	$('.dataBaseDisplay').text(openParameter['dataBase']);
	if (openParameter['thisObj'].hasClass("visible")) {
		openParameter['thisObj'].parents(".databaseParent" ).children( ".column" ).css("display","none");
		openParameter['thisObj'].removeClass("visible");

	}
	else{
		openParameter['thisObj'].parents(".databaseParent").children( ".column" ).css("display","block");
		openParameter['thisObj'].addClass("visible");
	}

	return openParameter;
}

/*get content Table*/
function contentTable( openParameter){
	if (openParameter['thisObj'].hasClass('actionNav')) {
		openParameter['dataBase'] = openParameter['thisObj'].parents(".databaseParent").children("li").children("a").text();
		openParameter['table'] = openParameter['thisObj'].text();
	}
	else
		openParameter['table'] = openParameter['thisObj'].parents("tr").children("td:first-child").text();
	$('.dataBaseDisplay').text(openParameter['dataBase']);
	$('.dataBaseDisplay').append("=>"+openParameter['table']);
	$('#Afficher').removeClass('active');
	$('#Structure').addClass('active');

	return openParameter;
}


/*create Database*/
function createDatabase( openParameter){ 

	openParameter['dataBase'] = openParameter['thisObj'].parents(".input-group").children("input").val();

	return openParameter;
}
function deleteDatabase( openParameter){ 

	openParameter['dataBase'] = openParameter['thisObj'].parents(".input-group").children("input").val();

	return openParameter;
}
function deleteTable( openParameter){ 


	openParameter['table'] = openParameter['thisObj'].parents("tr").children("td:first-child").text();
	return openParameter;
}
function deleteColumn( openParameter){ 

	openParameter['column'] = openParameter['thisObj'].parents("tr").children("td:first-child").text();

	return openParameter;
}
function deleteRow( openParameter){ 
	openParameter['key'] = $("#thead").children("tr").children("th").map(function(){
		return $(this).text();
	}).get();
	openParameter['value'] = openParameter['thisObj'].parents("tr").children("td").map(function(){
		return $(this).text();
	}).get();

	return openParameter;
}
function insertForm( openParameter){ 
	return openParameter;
}
function insertData( openParameter){ 
	openParameter['columns'] = $("#insertData").children("tbody").children("tr").children("td:first-child").map(function(){
		return $(this).children("p").text();
	}).get();
	openParameter['values'] = $("#insertData").children("tbody").children("tr").children("td").map(function(){
		return $(this).children("input").val();
	}).get();
	return openParameter;
}
function getColumnTable(openParameter){
	$(".dataBaseDisplay").append("=>"+openParameter['thisObj'].parents("tr").children("td:first-child").text());
	openParameter['table'] = openParameter['thisObj'].parents("tr").children("td:first-child").text();
	return openParameter;
}
function test(openParameter){

	return openParameter;
}
function freeRequester(openParameter){
	openParameter['dataBase']="noData";
	return openParameter;
}
function execSql(openParameter){
	alert($("textarea").val());
	openParameter['sql']=$("textarea").val();

	return openParameter;
}
function option(openParameter){
	openParameter['dataBase'] = "noData";
	return openParameter;
}
function setFileSql(openParameter){
	openParameter["mysqlPath"] = $(".mysqlPath").val();
	return openParameter;
}
function renameDatabase(openParameter){
	openParameter["renameDatabase"] = $("#renameDatabase").val();
	return openParameter;
}
function renameDatabaseView(openParameter){
	openParameter["dataBase"] = "noData";
	openParameter["tempDataBase"] = $(".dataBaseDisplay").text();
	
	return openParameter;
}
function addTableView(openParameter){
	openParameter["dataBase"] = "noData";
	openParameter["tempDataBase"] = $(".dataBaseDisplay").text();

	return openParameter;
}
function addTable(openParameter){
	openParameter["newTable"] = $(".addTable").val();
	return openParameter;
}
function renameTableView(openParameter){
	openParameter["dataBase"] = "noData";
	openParameter["table"] = openParameter['thisObj'].parents("tr").children("td:first-child").text();

	return openParameter;
}
function renameTable(openParameter){
	openParameter["newTableName"] = $(".renameTable").val();
	openParameter["dataBase"] = $(".dataBaseDisplay").text();
	openParameter["table"] = $(".tableName").text();

	return openParameter;
}
function addColumn(openParameter){
	openParameter["newColumnName"] = $(".newColumnName").val();
	openParameter["newColumnType"] = $(".newColumnType").val();
	return openParameter;
}
function addColumnView(openParameter){
	openParameter["dataBase"] = "noData";
	return openParameter;
}
function renameColumn(openParameter){
	alert($(".columnName").text());
	openParameter["columnName"] = $(".columnName").text();
	openParameter["newColumnName"] = $(".newColumnName").val();
	openParameter["newColumnType"] = $(".newColumnType").val();
	return openParameter;
}
function renameColumnView(openParameter){
	openParameter["dataBase"] = "noData";
	openParameter["newColumnName"] = openParameter['thisObj'].parents("tr").children("td:first-child").text();

	return openParameter;
}
function truncateTable(openParameter){
	openParameter["table"] = openParameter['thisObj'].parents("tr").children("td:first-child").text();
	return openParameter;
}
function updateRowView(openParameter){
	openParameter['columns'] = $("#updateRowView").children("thead").children("tr").children("th").map(function(){
		return $(this).text();
	}).get();
	openParameter['values'] = openParameter["thisObj"].parents("tr").children("td").map(function(){
		return $(this).text();
	}).get();
	return openParameter;
}
function updateRow(openParameter){
	openParameter['columns'] = $("#updateRowView").children("thead").children("tr").children("th").map(function(){
		return $(this).text();
	}).get();
	openParameter['values'] = $("#updateRowView").children("tbody").children("tr").children("td").map(function(){
		
		console.log($(this).children(".form-group").children("input").val());
		console.log($(this).children(".form-group").children("input").attr("placeholder"));
		if($(this).children(".form-group").children("input").val()!="")
			return $(this).children(".form-group").children("input").val();
		else{

			return $(this).children(".form-group").children("input").attr("placeholder");
		}
	}).get();
	return openParameter;
}
/*action all*/
$('body').on("click", ".action", function(e) { e.preventDefault();
	var openParameter = {};
	openParameter['dataBase'] = $('.dataBaseDisplay').text();
	openParameter['table'] = "none";
	openParameter['type'] = $(this).attr( "data-type" );
	openParameter['thisObj'] = $(this);
	var dest = $(this).attr( "data-dest" );
	
	if (openParameter['dataBase'].search( '=>' )!= -1) {
		var temp =openParameter['dataBase'].split("=>");
		openParameter["table"] = temp[1];
		openParameter['dataBase'] =  temp[0];
	} 
	if (openParameter['type']=='deleteDatabase' || openParameter['type']=='deleteColumn') {
		if (confirm('Voulez vous vraiment supprimer  ?')) {
			var all = eval(openParameter['type'])( openParameter); 

			var appendData = loadViews( openParameter);
			$("."+dest).html(appendData);
			alert(dataBase);
		} else {
			$("."+dest).html( alert_notif("Vous avez annuler la suppression ", "alert-danger"));
		}
	}
	else
	{
		var all = eval(openParameter['type'])( openParameter); 

		var appendData = loadViews( openParameter);
		$("."+dest).html(appendData);
	}

});





$(document).ready(function() {
	var loadView = ["header","footer"]; 
	var openParameter={};
	for (var i = loadView.length - 1; i >= 0; i--) { 
		openParameter['dataBase'] = "noData";
		openParameter['table'] = "noData";
		openParameter['type'] = loadView[i];
		openParameter['thisObj'] = null;
		$("#"+loadView[i]).html(loadViews(openParameter));
	}
	openParameter['dataBase'] = null;;
	openParameter['table'] = null;;
	openParameter['type'] = "nav";	 
	$("#nav").html(loadViews(openParameter));
	$( ".column" ).css("display","none");
});