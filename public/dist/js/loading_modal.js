function modal(){
    $('#loading_modal').modal('show');
}

function loadingModalHide(){
    setTimeout(function () {
        $('#loading_modal').modal('hide');
        // $("#loading_modal").hide();
    }, 1);
 }

// function modalStartForDownload(){
//     setTimeout(function () {
//         $('#loading_modal').modal('hide');
//     }, 15000);
// }
