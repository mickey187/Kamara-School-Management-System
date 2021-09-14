var gclass = null;
var gstream = '';
var gsection = '';
var gsubject = '';
var gcourse_load = '';
var all ='';
var counter_id = 11;
var assaArray = [];

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

    if(assaArray.length === 0){
        window.location.href = 'exportstudent/'+data[0].trim()+'/'+data[1].trim()+'/'+data[2].trim()+'/'+assasment+'/'+courseLoad+'/'+subject;
    }else{
        console.log("Assasment: "+$("#generateAs").val());
        console.log("Load: "+$("#courseExcel").val());
        var assasmentTotal = [];
        assasmentTotal.push(assasment+"-"+courseLoad);
        for (let index = 0; index < assaArray.length; index++) {
            console.log("Assasment: "+$('#assasment'+assaArray[index]).val());
            console.log("Load: "+$('#load'+assaArray[index]).val());
            assasmentTotal.push($('#assasment'+assaArray[index]).val()+"-"+$('#load'+assaArray[index]).val());
        }
        //   console.log(assasmentTotal);
          window.location.href = 'exportstudent/'+data[0].trim()+'/'+data[1].trim()+'/'+data[2].trim()+'/'+assasmentTotal+'/'+subject;

    }
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
function prepareAssasmentBtn() {
    // alert($("#numberOfAssasmentField").val());
    $.ajax({
        type: "GET",
        url: "getAllAssasment",
        data: "data",
        dataType: "json",
        success: function (response) {
            assasment = '';
            for (var index = 0; index < parseInt($("#numberOfAssasmentField").val()); index++) {
                assasment +=    '<div class="row col-12 mt-2" id="row'+counter_id+'">'+
                                    '<div class="col-6">'+
                                        '<select id="assasment'+counter_id+'" class="form-control">';
                                            response.forEach(element => {
                                                assasment += '<option value="'+element.assasment_type+'">'+element.assasment_type+'</option>';
                                            });
                            assasment +='</select>'+
                                    '</div>'+
                                    '<div class="col-4">'+
                                        '<input type="Number" placeholder="load" value="10" class="form-control" id="load'+counter_id+'">'+
                                        // '<input hidden type="text" class="form-control" id="classExcel">'+
                                        // '<input hidden type="text" class="form-control" id="generateSub">'+
                                    '</div>'+
                                    '<button class="btn btn-danger btn-sm" onclick="deleteAss(this);" value="'+counter_id+'"><i class="fas fa-trash"></i></button>'+
                                '</div>';
                    assaArray.push(counter_id);
                    counter_id++;
            }
            console.log(assaArray);
            $(assasment).appendTo("#addListOfAssasment");

        }
    });

}

function deleteAss(val){
    $("#row"+val.value).remove();
    console.log("Assasment: "+$('#assasment'+assaArray[2]).val());
    console.log("load: "+$('#load'+assaArray[2]).val());
    if(assaArray.indexOf(parseInt(val.value)) > -1){
        console.log(true);
        assaArray.splice(assaArray.indexOf(parseInt(val.value)),1);
    }else{
        console.log(false);
    }

}
