var gclass = null;
var gstream = '';
var gsection = '';
var gsubject = '';
var gcourse_load = '';
var all ='';

$('#modal-import-excel').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var detail = button.data('excel2')
    var modal = $(this)
    //modal.find('.modal-body #class').text()
    console.log(detail+"-*/");
    set();
    modal.find('.modal-body #exportdata').attr("value",detail)

});
function set(){
    gclass="Abraham";
}
console.log(gclass);
$('#modal-generate-excel').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var detail = button.data('excel')
    var modal = $(this)
    //modal.find('.modal-body #class').text()
    console.log("Ab vax")
    $(".modal-body #classExcel").val(detail);
   // modal.find('.modal-body #full_name').text(split[0])
   console.log(gclass)
});


function generateMarkList()
{
    var courseLoad = ($("#courseExcel").val()).trim();
    var data = ($("#classExcel").val()).split(",");
    var assasment = ($("#generateAs").val()).trim();
    var subject = (data[3]).trim();
    window.location.href = 'exportstudent/'+data[0].trim()+'/'+data[1].trim()+'/'+data[2].trim()+'/'+assasment+'/'+courseLoad+'/'+subject;
}

// $(document).ready(function() {
//     console.log("vvvvvvvvvvvvvv")
//     $("#input-id").fileinput({
//          type: "POST",
//          uploadUrl: "importExcel/"+gclass,
//          uploadExtraData: {
//                 _token:$("input[name='_token']").val(),
//                // _data:$("#exportdata").val(),
//               // data3:gclass
//          },
//          filebatchuploadcomplete:{

//          },
//          allowedFileExtensions: ["xlsx", "csv","xls"],
//          overwriteInitial:true
//     });
// });
