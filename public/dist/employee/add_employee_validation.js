const emp_slidePage = document.querySelector(".slidePage");
const emp_firstNextBtn = document.querySelector(".Emp_nextBtn");
const emp_prevBtnSec = document.querySelector(".Emp_prev-1");
const emp_nextBtnSec = document.querySelector(".Emp_next-1");
const emp_prevBtnThird = document.querySelector(".Emp_prev-2");
const emp_nextBtnThird = document.querySelector(".Emp_next-2");
const emp_prevBtnFourth = document.querySelector(".Emp_prev-3");
const emp_addBtn = document.querySelector(".submitBtn");

 var emp_first_name = document.getElementById('emp_first_name')
 emp_first_name.oninput=function(){
     if ((emp_first_name.value).length >= 3){
            setSuccessFor(emp_first_name);
        }if((emp_first_name.value).length < 3){
            setDefaultFor(emp_first_name,"please enter only valid input");
        }if((emp_first_name.value).length > 20  ){
            setErorFor(emp_first_name,"you reach maximum length");
        }
 };

 var emp_middle_name = document.getElementById('emp_middle_name')
emp_middle_name.oninput=function(){
    if ((emp_middle_name.value).length >= 3){
            setSuccessFor(emp_middle_name);
        }if((emp_middle_name.value).length < 3){
            setDefaultFor(emp_middle_name,"please stop messing arround enter only valid input");
        }if((emp_middle_name.value).length > 20  ){
            setErorFor(emp_middle_name,"you reach maximum length");
        }
};

var emp_last_name = document.getElementById('emp_last_name')
emp_last_name.oninput=function(){
        if((emp_last_name.value).length>= 3){
        setSuccessFor(emp_last_name);
    }if((emp_last_name.value).length < 3){
        setDefaultFor(emp_last_name,"enter correct number")
    }if((emp_last_name.value).length > 20){
        setErorFor(emp_last_name,"you reach the max length")
    }
};
var emp_birth_date = document.getElementById('emp_birth_date')
emp_birth_date.oninput=function(){
     if((emp_birth_date.value).length >=3){
        setSuccessFor(emp_birth_date);
    }if((emp_birth_date.value).length <3){
        setDefaultFor(emp_birth_date,"enter the correct number")
    }if((emp_birth_date.value).length > 20){
        setErorFor(emp_birth_date,"you reach max length")
    }
};

var emp_citizen = document.getElementById('emp_citizen')

emp_citizen.oninput=function(){
    if((emp_citizen.value).length >= 3){
        setSuccessFor(emp_citizen);
    }if((emp_citizen.value).length < 3){
        setDefaultFor(emp_citizen,"enter the correct number")
    }if((emp_citizen.value).length > 20){
        setErorFor(emp_citizen,"you reach the max length")
    }
};

var emp_education_status = document.getElementById('emp_education_status')
emp_education_status.oninput=function(){
         if((emp_education_status.value).length >= 3){
        setSuccessFor(emp_education_status);
    }if((emp_education_status.value).length < 3){
        setDefaultFor(emp_education_status,"enter the correct number")
    }if((emp_education_status.value).length > 20){
        setErorFor(emp_education_status,"you reach the max length")
    }
};

var emp_hired_date = document.getElementById('emp_hired_date')
emp_hired_date.oninput=function(){
        if((emp_hired_date.value).length >= 3){
        setSuccessFor(emp_hired_date);
    }if((emp_hired_date.value).length < 3){
        setDefaultFor(emp_hired_date,"enter the correct number")
    }if((emp_hired_date.value).length > 20){
        setErorFor(emp_hired_date,"you reach the max length")
    }
};

emp_firstNextBtn.addEventListener("click", function(){
    var emp_first_name = $('#emp_first_name').val();
    var emp_middle_name = $('#emp_middle_name').val();
    var emp_last_name = $('#emp_last_name').val();
    var emp_birth_date = $('#emp_birth_date').val();
    var emp_gender = $('#emp_gender').val();
    var emp_marriage_status = $('#emp_marriage_status').val();
    var emp_citizen = $('#emp_citizen').val();
    var emp_education_status = $('#emp_education_status').val();
    var emp_hired_date = $('#emp_hired_date').val();

    if( emp_first_name && emp_middle_name && emp_last_name && emp_birth_date && emp_gender && emp_marriage_status && emp_citizen && emp_education_status && emp_hired_date){
        emp_slidePage.style.marginLeft = "-25%";
        bullet[current - 1].classList.add("active");
        progressText[current - 1].classList.add("active");
        progressCheck[current - 1].classList.add("active");
        current += 1;
    }else{
        // alert("የመጀመሪያ ስም ባዶ መሆን አይችልም");
        if($('#emp_first_name').val()==="")
            setErorFor(document.getElementById('emp_first_name'),"የመጀመሪያ ስም ባዶ መሆን አይችልም፡፡ ");
        else
            setSuccessFor(document.getElementById('emp_first_name'));
        if($('#emp_middle_name').val()==="")
            setErorFor(document.getElementById('emp_middle_name'),"የአባት ስም ባዶ መሆን አይችልም፡፡ ");
        else
            setSuccessFor(document.getElementById('emp_middle_name'));
        if($('#emp_last_name').val()==="")
            setErorFor(document.getElementById('emp_last_name'),"የአያት ስም ባዶ መሆን አይችልም፡፡ ");
        else
            setSuccessFor(document.getElementById('emp_last_name'));
        if($('#emp_gender').val()==="")
            setErorFor(document.getElementById('emp_gender'),"ጾታ ባዶ መሆን አይችልም፡፡ ");
        else
            setSuccessFor(document.getElementById('emp_gender'));
        if($('#emp_marriage_status').val()==="")
            setErorFor(document.getElementById('emp_marriage_status'),"የጋብቻ ሁኔታ ባዶ መሆን አይችልም፡፡ ");
        else
            setSuccessFor(document.getElementById('emp_marriage_status'));
        if($('#emp_citizen').val()==="")
            setErorFor(document.getElementById('emp_citizen'),"ዜግነት ባዶ መሆን አይችልም፡፡  ");
        else
            setSuccessFor(document.getElementById('emp_citizen'));
        if($('#emp_education_status').val()==="")
            setErorFor(document.getElementById('emp_education_status'),"የት/ት ሁኔታ ባዶ መሆን አይችልም፡፡ ");
        else
            setSuccessFor(document.getElementById('emp_education_status'));
        if($('#emp_hired_date').val()==="")
            setErorFor(document.getElementById('emp_hired_date'),"የቅጥር ቀን ባዶ መሆን አይችልም፡፡ ");
        else
            setSuccessFor(document.getElementById('emp_hired_date'));
        if($('#emp_birth_date').val()==="")
            setErorFor(document.getElementById('emp_birth_date'),"የልደት ቀን ባዶ መሆን አይችልም፡፡ ");
        else
            setSuccessFor(document.getElementById('emp_birth_date'));
    }
})

function checkInput(input, message){

}

function setDefaultFor(input, message) {

    const formControll = input.parentElement;
    const small = formControll.querySelector('small');
    small.innerText = message;
    formControll.className = 'field warning';

}

function setErorFor(input, message) {
    const formControll = input.parentElement;
    const small = formControll.querySelector('small');
    small.innerText = message;
    formControll.className = 'field error';
}

function setSuccessFor(input) {
    const formControll = input.parentElement;
    formControll.className = 'field success';
}

emp_prevBtnSec.addEventListener("click", function() {
    emp_slidePage.style.marginLeft = "0%";
    bullet[current - 2].classList.remove("active");
    progressText[current - 2].classList.remove("active");
    progressCheck[current - 2].classList.remove("active");
    current -= 1;
});

var emp_job_trainning = document.getElementById('emp_job_trainning')
emp_job_trainning.oninput=function(){
    if ((emp_job_trainning.value).length >= 3){
            setSuccessFor(emp_job_trainning);
        }if((emp_job_trainning.value).length < 3){
            setDefaultFor(emp_job_trainning,"please stop messing arround enter only valid input");
        }if((emp_job_trainning.value).length > 20  ){
            setErorFor(emp_job_trainning,"you reach maximum length");
        }
};
var emp_previous_employment = document.getElementById('emp_previous_employment')
emp_previous_employment.oninput=function(){
    if ((emp_previous_employment.value).length >= 3){
            setSuccessFor(emp_previous_employment);
        }if((emp_previous_employment.value).length < 3){
            setDefaultFor(emp_previous_employment,"please stop messing arround enter only valid input");
        }if((emp_previous_employment.value).length > 20  ){
            setErorFor(emp_previous_employment,"you reach maximum length");
        }
};
 var emp_special_skill = document.getElementById('emp_special_skill')
 emp_special_skill.oninput=function(){
     if ((emp_special_skill.value).length >= 3){
            setSuccessFor(emp_special_skill);
        }if((emp_special_skill.value).length < 3){
            setDefaultFor(emp_special_skill,"please stop messing arround enter only valid input");
        }if((emp_special_skill.value).length > 20  ){
            setErorFor(emp_special_skill,"you reach maximum length");
        }
 };

 var emp_net_salary = document.getElementById('emp_net_salary')
 emp_net_salary.oninput=function(){
     if ((emp_net_salary.value).length >= 3){
            setSuccessFor(emp_net_salary);
        }if((emp_net_salary.value).length < 3){
            setDefaultFor(emp_net_salary,"please enter only valid input");
        }if((emp_net_salary.value).length > 20  ){
            setErorFor(emp_net_salary,"you reach maximum length");
        }
 };

 var emp_hire_type = document.getElementById('emp_hire_type')
 emp_hire_type.oninput=function(){
      if ((emp_hire_type.value).length >= 3){
            setSuccessFor(emp_hire_type);
        }if((emp_hire_type.value).length < 3){
            setDefaultFor(emp_hire_type,"please enter only valid input");
        }if((emp_hire_type.value).length > 20  ){
            setErorFor(emp_hire_type,"you reach maximum length");
        }
 };

 var emp_religion = document.getElementById('emp_employee_religion')
 emp_religion.oninput=function(){
     if ((emp_religion.value).length >= 3){
            setSuccessFor(emp_religion);
        }if((emp_religion.value).length < 3){
            setDefaultFor(emp_religion,"please enter only valid input");
        }if((emp_religion.value).length > 20  ){
            setErorFor(emp_religion,"you reach maximum length");
        }
 };

 var emp_emergency_contact = document.getElementById('emp_emergency_contact')
 emp_emergency_contact.oninput=function(){
     if ((emp_emergency_contact.value).length >= 3){
            setSuccessFor(emp_emergency_contact);
        }if((emp_emergency_contact.value).length < 3){
            setDefaultFor(emp_emergency_contact,"please enter only valid input");
        }if((emp_emergency_contact.value).length > 20  ){
            setErorFor(emp_emergency_contact,"you reach maximum length");
        }
 };

 var emp_relation = document.getElementById('emp_relation')
 emp_relation.oninput=function(){
     if ((emp_relation.value).length >= 3){
            setSuccessFor(emp_relation);
        }if((emp_relation.value).length < 3){
            setDefaultFor(emp_relation,"please stop messing arround enter only valid input");
        }if((emp_relation.value).length > 20  ){
            setErorFor(emp_relation,"you reach maximum length");
        }
 };

 var emp_past_job_position = document.getElementById('emp_past_job_position')
emp_past_job_position.oninput=function(){
    if ((emp_past_job_position.value).length >= 3){
            setSuccessFor(emp_past_job_position);
        }if((emp_past_job_position.value).length < 3){
            setDefaultFor(emp_past_job_position,"please enter only valid input");
        }if((emp_past_job_position.value).length > 20  ){
            setErorFor(emp_past_job_position,"you reach maximum length");
        }
};

emp_nextBtnSec.addEventListener("click", function() {
        var emp_job_trainning = $('#emp_job_trainning').val();
        var emp_previous_employment = $('#emp_previous_employment').val();
        var emp_special_skill = $('#emp_special_skill').val();
        var emp_net_salary = $('#emp_net_salary').val();
        var emp_hire_type = $('#emp_hire_type').val();
        var emp_religion = $('#emp_employee_religion').val();
        var emp_emergency_contact = $('#emp_emergency_contact').val();
        var emp_relation = $('#emp_relation').val();
        var emp_past_job_position = $('#emp_past_job_position').val();

        if(emp_job_trainning && emp_previous_employment && emp_special_skill && emp_net_salary && emp_hire_type && emp_religion && emp_emergency_contact && emp_relation && emp_past_job_position)
        {
            emp_slidePage.style.marginLeft = "-50%";
            bullet[current - 1].classList.add("active");
            progressText[current - 1].classList.add("active");
            progressCheck[current - 1].classList.add("active");
            current += 1;
        }else{
            if(emp_job_trainning==="")
                setErorFor(document.getElementById('emp_job_trainning'),"የስልጠና ት/ት ባዶ መሆን አይችልም፡፡ ");
            else
                setSuccessFor(document.getElementById('emp_job_trainning'));
            if(emp_previous_employment==="")
                setErorFor(document.getElementById('emp_previous_employment'),"ከዚህ በፊት ተቀጥሮ የሰራበት ባዶ መሆን አይችልም፡፡ ");
            else
                setSuccessFor(document.getElementById('emp_previous_employment'));
            if(emp_special_skill==="")
                setErorFor(document.getElementById('emp_special_skill'),"የተለየ የስራ ብቃት ባዶ መሆን አይችልም፡፡ ");
            else
                setSuccessFor(document.getElementById('emp_special_skill'));
            if(emp_net_salary==="")
                setErorFor(document.getElementById('emp_net_salary'),"የክፍያ መጠን ባዶ መሆን አይችልም፡፡ ");
            else
                setSuccessFor(document.getElementById('emp_net_salary'));
            if(emp_hire_type==="")
                setErorFor(document.getElementById('emp_hire_type'),"የቅጥር ስራ አይነት ባዶ መሆን አይችልም፡፡ ");
            else
                setSuccessFor(document.getElementById('emp_hire_type'));
            if(emp_religion==="")
                setErorFor(document.getElementById('emp_employee_religion'),"እምነት ባዶ መሆን አይችልም፡፡ ");
            else
                setSuccessFor(document.getElementById('emp_employee_religion'));
            if(emp_emergency_contact==="")
                setErorFor(document.getElementById('emp_emergency_contact'),"ያደጋ ጊዜ ተጠሪ ባዶ መሆን አይችልም፡፡ ");
            else
                setSuccessFor(document.getElementById('emp_emergency_contact'));
            if(emp_relation==="")
                setErorFor(document.getElementById('emp_relation'),"ዘመድ ባዶ መሆን አይችልም፡፡ ");
            else
                setSuccessFor(document.getElementById('emp_relation'));
            if(emp_past_job_position==="")
                setErorFor(document.getElementById('emp_past_job_position'),"ከዚ በፊት የሰራበት የስራ ዘርፍ ባዶ መሆን አይችልም፡፡ ");
            else
                setSuccessFor(document.getElementById('emp_past_job_position'));
        }


});

// emp_date_of_study_val
var emp_date_of_study_val = document.getElementById('emp_date_of_study_val')
emp_date_of_study_val.oninput=function(){
    if((emp_date_of_study_val.value).length >= 3){
        setSuccessFor(emp_date_of_study_val);
    }if((emp_date_of_study_val.value).length < 3){
        setDefaultFor(emp_date_of_study_val,"please enter the valid reason")
    }if((emp_date_of_study_val.value).length > 20){
        setErorFor(emp_date_of_study_val,"you reach max length")
    }
}

var emp_teacher_traning_year_val = document.getElementById('emp_teacher_traning_year_val')
emp_teacher_traning_year_val.oninput=function(){
    if((emp_teacher_traning_year_val.value).length >= 3){
        setSuccessFor(emp_teacher_traning_year_val);
    }if((emp_teacher_traning_year_val.value).length < 3){
        setDefaultFor(emp_teacher_traning_year_val,"please enter the valid reason")
    }if((emp_teacher_traning_year_val.value).length > 20){
        setErorFor(emp_teacher_traning_year_val,"you reach max length")
    }
}

var emp_debut_as_a_teacher_val = document.getElementById('emp_debut_as_a_teacher_val')
emp_debut_as_a_teacher_val.oninput=function(){
    if((emp_debut_as_a_teacher_val.value).length >= 3){
        setSuccessFor(emp_debut_as_a_teacher_val);
    }if((emp_debut_as_a_teacher_val.value).length < 3){
        setDefaultFor(emp_debut_as_a_teacher_val,"please enter the valid reason")
    }if((emp_debut_as_a_teacher_val.value).length > 20){
        setErorFor(emp_debut_as_a_teacher_val,"you reach max length")
    }
}

var emp_past_employment_place = document.getElementById('emp_past_employment_place')
emp_past_employment_place.oninput=function(){
    if((emp_past_employment_place.value).length >= 3){
        setSuccessFor(emp_past_employment_place);
    }if((emp_past_employment_place.value).length < 3){
        setDefaultFor(emp_past_employment_place,"please enter the valid reason")
    }if((emp_past_employment_place.value).length > 20){
        setErorFor(emp_past_employment_place,"you reach max length")
    }
}



 var teach_field_of_study = document.getElementById('emp_field_of_study_val')
 teach_field_of_study.oninput=function(){
       if((teach_field_of_study.value).length >= 3){
        setSuccessFor(teach_field_of_study);
    }if((teach_field_of_study.value).length < 3){
        setDefaultFor(teach_field_of_study,"please enter the valid reason")
    }if((teach_field_of_study.value).length > 20){
        setErorFor(teach_field_of_study,"you reach max length")
    }
 };


    var teach_place_of_study = document.getElementById('emp_place_of_study_val')
    teach_place_of_study.oninput=function(){
         if((teach_place_of_study.value).length >= 3){
        setSuccessFor(teach_place_of_study);
    }if((teach_place_of_study.value).length < 3){
        setDefaultFor(teach_place_of_study,"please enter the valid reason")
    }if((teach_place_of_study.value).length > 20){
        setErorFor(teach_place_of_study,"you reach max length")
    }
    };


    var teach_traning_program = document.getElementById('emp_teacher_traning_program_val')
    teach_traning_program.oninput=function(){
          if((teach_traning_program.value).length >= 3){
        setSuccessFor(teach_traning_program);
    }if((teach_traning_program.value).length < 3){
        setDefaultFor(teach_traning_program,"please enter the valid reason")
    }if((teach_traning_program.value).length > 20){
        setErorFor(teach_traning_program,"you reach max length")
    }
    };

    var teach_traning_institiute = document.getElementById('emp_teacher_traning_institute_val')
    teach_traning_institiute.oninput=function(){
            if((teach_traning_institiute.value).length >= 3){
        setSuccessFor(teach_traning_institiute);
    }if((teach_traning_institiute.value).length < 3){
        setDefaultFor(teach_traning_institiute,"please enter the valid reason")
    }if((teach_traning_institiute.value).length > 20){
        setErorFor(teach_traning_institiute,"you reach max length")
    }
};

$("#emp_job_position_selecter_val").change(function(){

        if($("#emp_job_position_selecter_val").val()==="1"){
            $("#emp_debut_as_a_teacher").show();
            $("#emp_field_of_study").show();
            $("#place_of_study").show();
            $("#teacher_traning_program").show();
            $("#date_of_study").show();
            $("#teacher_traning_year").show();
            $("#teacher_traning_institute").show();

        }else{
            $("#emp_debut_as_a_teacher").hide();
            $("#emp_field_of_study").hide();
            $("#place_of_study").hide();
            $("#teacher_traning_program").hide();
            $("#date_of_study").hide();
            $("#teacher_traning_year").hide();
            $("#teacher_traning_institute").hide();
        }
});
// $(selector).load("url", "data", function (response, status, request) {
//     this; // dom element

// });
$(window).on("load",function(){

    if($("#emp_job_position_selecter_val").val()==="1"){
        $("#emp_debut_as_a_teacher").show();
        $("#emp_field_of_study").show();
        $("#place_of_study").show();
        $("#teacher_traning_program").show();
        $("#date_of_study").show();
        $("#teacher_traning_year").show();
        $("#teacher_traning_institute").show();
    }else{
        $("#emp_debut_as_a_teacher").hide();
        $("#emp_field_of_study").hide();
        $("#place_of_study").hide();
        $("#teacher_traning_program").hide();
        $("#date_of_study").hide();
        $("#teacher_traning_year").hide();
        $("#teacher_traning_institute").hide();
    }
});

emp_nextBtnThird.addEventListener("click", function() {
    var emp_past_employment_place = $('#emp_past_employment_place').val();
    var emp_role = $('#emp_role_selecter').val();
    var emp_job_position = $('#emp_job_position_selecter_val').val();
    var teach_debut = $('#emp_debut_as_a_teacher_val').val();
    var teach_field_of_study = $('#emp_field_of_study_val').val();
    var teach_place_of_study = $('#emp_place_of_study_val').val();
    var teach_date_of_study = $('#emp_date_of_study_val').val();
    var teach_traning_program = $('#emp_teacher_traning_program_val').val();
    var teach_traning_year = $('#emp_teacher_traning_year_val').val();
    var teach_traning_institiute = $('#emp_teacher_traning_institute_val').val();

    if(emp_job_position === "1"){
        if(emp_past_employment_place && emp_role && teach_debut && teach_field_of_study && teach_place_of_study && teach_date_of_study && teach_traning_program && teach_traning_year && teach_traning_institiute)
{
            emp_slidePage.style.marginLeft = "-75%";
            bullet[current - 1].classList.add("active");
            progressText[current - 1].classList.add("active");
            progressCheck[current - 1].classList.add("active");
            current += 1;
        }else{
            alert("Error");
            if(emp_past_employment_place==="")
                setErorFor(document.getElementById('emp_past_employment_place'),"ከዚ በፊት የሰራበት የስራ ቦታ ባዶ መሆን አይችልም፡፡ ");
            else
                setSuccessFor(document.getElementById('emp_past_employment_place'));
            if(emp_role==="")
                setErorFor(document.getElementById('emp_role_selecter'),"የሰራበት የስራ ድርሻ ቦታ ባዶ መሆን አይችልም፡፡ ");
            else
                setSuccessFor(document.getElementById('emp_role_selecter'));
            if(teach_debut==="")
                setErorFor(document.getElementById('emp_debut_as_a_teacher_val'),"በመምህርነት የተቀጠረበት ቀን ባዶ መሆን አይችልም፡፡ ");
            else
                setSuccessFor(document.getElementById('emp_debut_as_a_teacher_val'));
            if(teach_field_of_study==="")
                setErorFor(document.getElementById('emp_field_of_study_val'),"የተማረበት የትምህርት ዘርፍ ባዶ መሆን አይችልም፡፡ ");
            else
                setSuccessFor(document.getElementById('emp_field_of_study_val'));
            if(teach_place_of_study==="")
                setErorFor(document.getElementById('emp_place_of_study_val'),"የተማረበት ቦታ ባዶ መሆን አይችልም፡፡ ");
            else
                setSuccessFor(document.getElementById('emp_place_of_study_val'));
            if(teach_date_of_study==="")
                setErorFor(document.getElementById('emp_date_of_study_val'),"የተማረበት ቀን ባዶ መሆን አይችልም፡፡ ");
            else
                setSuccessFor(document.getElementById('emp_date_of_study_val'));
            if(teach_traning_program==="")
                setErorFor(document.getElementById('emp_teacher_traning_program_val'),"በመምህርነት የሰለጠነበት ት/ት ባዶ መሆን አይችልም፡፡ ");
            else
                setSuccessFor(document.getElementById('emp_teacher_traning_program_val'));
            if(teach_traning_year==="")
                setErorFor(document.getElementById('emp_teacher_traning_year_val'),"በመምህርነት የሰለጠነበት ዘመን ባዶ መሆን አይችልም፡፡ ");
            else
                setSuccessFor(document.getElementById('emp_teacher_traning_year_val'));
            if(teach_traning_institiute==="")
                setErorFor(document.getElementById('emp_teacher_traning_institute_val'),"በመምህርነት የሰለጠነበት ተቋም ባዶ መሆን አይችልም፡፡ ");
            else
                setSuccessFor(document.getElementById('emp_teacher_traning_institute_val'));

        }
    }else{
        if(emp_past_employment_place){
            emp_slidePage.style.marginLeft = "-75%";
            bullet[current - 1].classList.add("active");
            progressText[current - 1].classList.add("active");
            progressCheck[current - 1].classList.add("active");
            current += 1;
        }else{
            alert("Error");
            if(emp_past_employment_place==="")
                setErorFor(document.getElementById('emp_past_employment_place'),"ከዚ በፊት የሰራበት የስራ ቦታ ባዶ መሆን አይችልም፡፡ ");
            else
                setSuccessFor(document.getElementById('emp_past_employment_place'));
        }
    }

});

emp_prevBtnThird.addEventListener("click", function() {
            emp_slidePage.style.marginLeft = "-25%";
            bullet[current - 2].classList.remove("active");
            progressText[current - 2].classList.remove("active");
            progressCheck[current - 2].classList.remove("active");
            current -= 1;
});
emp_prevBtnFourth.addEventListener("click", function() {
    emp_slidePage.style.marginLeft = "-50%";
    bullet[current - 2].classList.remove("active");
    progressText[current - 2].classList.remove("active");
    progressCheck[current - 2].classList.remove("active");
    current -= 1;
});

var emp_city = document.getElementById('emp_city')
emp_city.oninput=function(){
     if((emp_city.value).length >= 3){
        setSuccessFor(emp_city);
    }if((emp_city.value).length < 3){
        setDefaultFor(emp_city,"please enter the valid parent name")
    }if((emp_city.value).length > 20){
        setErorFor(emp_city,"you reach max length")
    }
};
var emp_unit = document.getElementById('emp_unit')
emp_unit.oninput=function(){
     if((emp_unit.value).length >= 3){
        setSuccessFor(emp_unit);
    }if((emp_unit.value).length < 3){
        setDefaultFor(emp_unit,"please enter the valid city")
    }if((emp_unit.value).length > 20){
        setErorFor(emp_unit,"you reach max length")
    }
};


emp_addBtn.addEventListener("click", function() {
    var emp_city = document.getElementById('emp_city')
    var emp_unit = document.getElementById('emp_unit')
    var emp_kebele = document.getElementById('emp_kebele')
    var emp_house_number = document.getElementById('emp_house_number')
    var emp_POBox = document.getElementById('emp_POBox')
    var emp_email = document.getElementById('emp_email')
    var emp_phone = document.getElementById('emp_phone1')
    var emp_alt_phone = document.getElementById('emp_phone2')
 if((emp_city.value).length<3){
        setDefaultFor(emp_city,"employee city can not be min length")

    }else{
        setSuccessFor(emp_city)
    }

    if((emp_unit.value).length<3){
        setDefaultFor(emp_unit,"employee sub city can not be min length")

    }else{
        setSuccessFor(emp_unit)
    }

    if(emp_kebele.value.trim() === '' ){
        setErorFor(emp_kebele,"employee kebele can not be null")

    }else{
        setSuccessFor(emp_kebele)
    }

    if(emp_house_number.value.trim() === ''){
        setErorFor(emp_house_number,"employee house number can not be null")

    }else{
        setSuccessFor(emp_house_number)
    }

    if(emp_POBox.value.trim() === ''){
        setErorFor(emp_POBox,"parent post box is can not be null")

    }else{
        setSuccessFor(emp_POBox)
    }

    if(emp_email.value.trim() === ''){
        setErorFor(emp_email,"employee email can not be null")

    }else{
        setSuccessFor(emp_email)
    }

    if(emp_phone.value.trim () === ''){
        setDefaultFor(emp_phone,"employee phone number can not be null")

    }else{
        setSuccessFor(emp_phone)
    }

    if(emp_alt_phone.value.trim() === ''){
        setDefaultFor(emp_alt_phone,"employee phone number 2 can not be null")

    }else{
        setSuccessFor(emp_alt_phone)
    }

    if(false){

    }else
    {
        emp_slidePage.style.marginLeft = "-75%";
        bullet[current - 1].classList.add("active");
        progressText[current - 1].classList.add("active");
        progressCheck[current - 1].classList.add("active");
        current += 1;
    }


});


function alphaOnly(event) {
    var key = event.keyCode;
    return ((key >= 65 && key <= 90) || key == 8);
};



// function allCharacter(event) {
//     var specialCharacter = event.keyCode;
//     return ((specialCharacter >= 65 && key <= 90) || specialCharacter == 8 || specialCharacter ==32 ||
//     specialCharacter >=47 && specialCharacter <=57 );
// };
