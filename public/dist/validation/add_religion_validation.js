


// var emp_employee_religion = document.getElementById('employee_religion')
var submit_button = document.getElementById('submit12');
submit_button.addEventListener("click",function(){
    var emp_employee_religion = document.getElementById('employee_religion').value.trim()
    if(emp_employee_religion === ''){
        setEror()
    }else{
        onSuccess();
        document.location.href = 'addReligion/'+emp_employee_religion;
      }
 })

 function setEror(){
     alert('religion can not be null')
 }
 function onSuccess(){
     alert('success')
    };

    function alphaOnly(event) {
  var key = event.keyCode;
  return ((key >= 65 && key <= 90) || key == 8);
};


 