$(document).ready(function(){
// code to get all records from table via select box
$("#pbarang").change(function() {
var id = $(this).find(":selected").val();
var dataString = 'empid='+ id;
$.ajax({
url: 'get_informasi_barang.php',
dataType: "json",
data: dataString,
cache: false,
success: function(employeeData) {
if(employeeData) {
$("#heading").show();
$("#no_records").hide();
$("#emp_name").text(employeeData.employee_name);
$("#emp_age").text(employeeData.employee_age);
$("#emp_salary").text(employeeData.employee_salary);
$("#records").show();
} else {
$("#heading").hide();
$("#records").hide();
$("#no_records").show();
}
}
});
})
});

Ste