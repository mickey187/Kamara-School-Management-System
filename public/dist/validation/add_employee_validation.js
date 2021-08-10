



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
            setDefaultFor(emp_first_name,"please stop messing arround enter only valid input");
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

var emp_hired_date = document.getElementById('hired_date')
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
    var emp_first_name = document.getElementById('emp_first_name')
    var emp_middle_name = document.getElementById('emp_middle_name')
    var emp_last_name = document.getElementById('emp_last_name')
    var emp_birth_date = document.getElementById('emp_birth_date')
    var emp_gender = document.getElementById('emp_gender')
    var emp_marriage_status = document.getElementById('marriage_status')
    var emp_citizen = document.getElementById('emp_citizen')
    var emp_education_status = document.getElementById('education_status')
    var emp_hired_date = document.getElementById('hired_date')

    // if(emp_first_name.value.length<3 ){
    //     setDefaultFor(emp_first_name,"First name can not be min length")
    // }else{
    //     setSuccessFor(emp_first_name)
    // }

    //    if(emp_middle_name.value.length<3){
    //     setDefaultFor(emp_middle_name,"Middle name can not be min length")
    // }else{
    //     setSuccessFor(emp_middle_name)
    // }

    //      if(emp_last_name.value.length<3){
    //     setDefaultFor(emp_last_name,"Last name can not be min length")
    // }else{
    //     setSuccessFor(emp_last_name)
    // }

    //    if(emp_birth_date.value.length<3){
    //     setDefaultFor(emp_birth_date,"Birth date can not be min length")
    // }else{
    //     setSuccessFor(emp_birth_date)
    // }

    //   if(emp_gender.value.length<3){
    //     setDefaultFor(emp_gender,"Gender can not be min length")
    // }else{
    //     setSuccessFor(emp_gender)
    // }

    //  if(emp_marriage_status.value.length<3){
    //     setDefaultFor(emp_marriage_status,"Marriage status can not be min length")
    // }else{
    //     setSuccessFor(emp_marriage_status)
    // }

    //  if(emp_citizen.value.length<3){
    //     setDefaultFor(emp_citizen,"Citizenship can not be min length")
    // }else{
    //     setSuccessFor(emp_citizen)
    // }

    // if(emp_education_status.value.length<3){
    //     setDefaultFor(emp_education_status,"Education status can not be min length")
    // }else{
    //     setSuccessFor(emp_education_status)
    // }

    // if(emp_hired_date.value.length<3){
    //     setDefaultFor(emp_hired_date,"Hired date can not be min length")
    // }else{
    //     setSuccessFor(emp_hired_date)
    // }


    if(false){
            // setErorFor(emp_first_name,"First Name is not")
            // setErorFor(emp_middle_name,"Middle Name is Not Found")
            // setErorFor(emp_last_name,"Last Name is Not Found")
        //setEror()
    }else{

         emp_slidePage.style.marginLeft = "-25%";
            bullet[current - 1].classList.add("active");
            progressText[current - 1].classList.add("active");
            progressCheck[current - 1].classList.add("active");
            current += 1;
        // onSuccess()
    }
})

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

var emp_job_trainning = document.getElementById('job_trainning')
emp_job_trainning.oninput=function(){
    if ((emp_job_trainning.value).length >= 3){
            setSuccessFor(emp_job_trainning);
        }if((emp_job_trainning.value).length < 3){
            setDefaultFor(emp_job_trainning,"please stop messing arround enter only valid input");
        }if((emp_job_trainning.value).length > 20  ){
            setErorFor(emp_job_trainning,"you reach maximum length");
        }
};
var emp_previous_employment = document.getElementById('previous_employment')
emp_previous_employment.oninput=function(){
    if ((emp_previous_employment.value).length >= 3){
            setSuccessFor(emp_previous_employment);
        }if((emp_previous_employment.value).length < 3){
            setDefaultFor(emp_previous_employment,"please stop messing arround enter only valid input");
        }if((emp_previous_employment.value).length > 20  ){
            setErorFor(emp_previous_employment,"you reach maximum length");
        }
};
 var emp_special_skill = document.getElementById('special_skill')
 emp_special_skill.oninput=function(){
     if ((emp_special_skill.value).length >= 3){
            setSuccessFor(emp_special_skill);
        }if((emp_special_skill.value).length < 3){
            setDefaultFor(emp_special_skill,"please stop messing arround enter only valid input");
        }if((emp_special_skill.value).length > 20  ){
            setErorFor(emp_special_skill,"you reach maximum length");
        }
 };

 var emp_net_salary = document.getElementById('net_salary')
 emp_net_salary.oninput=function(){
     if ((emp_net_salary.value).length >= 3){
            setSuccessFor(emp_net_salary);
        }if((emp_net_salary.value).length < 3){
            setDefaultFor(emp_net_salary,"please stop messing arround enter only valid input");
        }if((emp_net_salary.value).length > 20  ){
            setErorFor(emp_net_salary,"you reach maximum length");
        }
 };

 var emp_hire_type = document.getElementById('hire_type')
 emp_hire_type.oninput=function(){
      if ((emp_hire_type.value).length >= 3){
            setSuccessFor(emp_hire_type);
        }if((emp_hire_type.value).length < 3){
            setDefaultFor(emp_hire_type,"please stop messing arround enter only valid input");
        }if((emp_hire_type.value).length > 20  ){
            setErorFor(emp_hire_type,"you reach maximum length");
        }
 };

 var emp_religion = document.getElementById('employee_religion')
 emp_religion.oninput=function(){
     if ((emp_religion.value).length >= 3){
            setSuccessFor(emp_religion);
        }if((emp_religion.value).length < 3){
            setDefaultFor(emp_religion,"please stop messing arround enter only valid input");
        }if((emp_religion.value).length > 20  ){
            setErorFor(emp_religion,"you reach maximum length");
        }
 };

 var emp_emergency_contact = document.getElementById('emergency_contact')
 emp_emergency_contact.oninput=function(){
     if ((emp_emergency_contact.value).length >= 3){
            setSuccessFor(emp_emergency_contact);
        }if((emp_emergency_contact.value).length < 3){
            setDefaultFor(emp_emergency_contact,"please stop messing arround enter only valid input");
        }if((emp_emergency_contact.value).length > 20  ){
            setErorFor(emp_emergency_contact,"you reach maximum length");
        }
 };

 var emp_relation = document.getElementById('relation')
 emp_relation.oninput=function(){
     if ((emp_relation.value).length >= 3){
            setSuccessFor(emp_relation);
        }if((emp_relation.value).length < 3){
            setDefaultFor(emp_relation,"please stop messing arround enter only valid input");
        }if((emp_relation.value).length > 20  ){
            setErorFor(emp_relation,"you reach maximum length");
        }
 };

 var emp_past_job_position = document.getElementById('past_job_position')
emp_past_job_position.oninput=function(){
    if ((emp_past_job_position.value).length >= 3){
            setSuccessFor(emp_past_job_position);
        }if((emp_past_job_position.value).length < 3){
            setDefaultFor(emp_past_job_position,"please stop messing arround enter only valid input");
        }if((emp_past_job_position.value).length > 20  ){
            setErorFor(emp_past_job_position,"you reach maximum length");
        }
};
emp_nextBtnSec.addEventListener("click", function() {
        var emp_job_trainning = document.getElementById('job_trainning')
        var emp_previous_employment = document.getElementById('previous_employment')
        var emp_special_skill = document.getElementById('special_skill')
        var emp_net_salary = document.getElementById('net_salary')
        var emp_hire_type = document.getElementById('hire_type')
        var emp_religion = document.getElementById('employee_religion')
        var emp_emergency_contact = document.getElementById('emergency_contact')
        var emp_relation = document.getElementById('relation')
        var emp_past_job_position = document.getElementById('past_job_position')

        if(emp_job_trainning.value.length<3){
        setDefaultFor(emp_job_trainning,"job trainning can not be min length")
    }else{
        setSuccessFor(emp_job_trainning)
    }

      if(emp_previous_employment.value.length<3){
        setDefaultFor(emp_previous_employment,"previous employment can not be  min length")
    }else{
        setSuccessFor(emp_previous_employment)
    }

     if(emp_special_skill.value.length<3){
        setDefaultFor(emp_special_skill,"special skill can not be  min length")
    }else{
        setSuccessFor(emp_special_skill)
    }

      if(emp_net_salary.value.length<3){
        setDefaultFor(emp_net_salary,"net salary can not be  min length")
    }else{
        setSuccessFor(emp_net_salary)
    }

     if(emp_hire_type.value.length<3){
        setDefaultFor(emp_hire_type,"hire type can not be  min length")
    }else{
        setSuccessFor(emp_hire_type)
    }

    if(emp_religion.value.trim()=== ''){
        setDefaultFor(emp_religion,"employee religion can not be  min length")
    }else{
        setSuccessFor(emp_religion)
    }

    if(emp_emergency_contact.value.length<3){
        setDefaultFor(emp_emergency_contact,"emergency contact can not be empty")
    }else{
        setSuccessFor(emp_emergency_contact)
    }

    if(emp_relation.value.length<3){
        setDefaultFor(emp_relation,"employee relation can not be  min length")
    }else{
        setSuccessFor(emp_relation)
    }

    if(emp_past_job_position.value.length<3){
        setDefaultFor(emp_past_job_position,"past job position can not be  min length")
    }else{
        setSuccessFor(emp_past_job_position)
    }

        if(
              emp_job_trainning.value.length < 3 ||
              emp_previous_employment.value.length < 3 ||
              emp_special_skill.value.length < 3 ||
              emp_net_salary.value.length < 3 ||
              emp_hire_type.value.length < 3 ||
              emp_religion.value.trim() === ''||
              emp_emergency_contact.value.length < 3 ||
              emp_relation.value.length < 3 ||
              emp_past_job_position.value.length < 3
        ){
                // setEror()
        }else
        {
            emp_slidePage.style.marginLeft = "-50%";
            bullet[current - 1].classList.add("active");
            progressText[current - 1].classList.add("active");
            progressCheck[current - 1].classList.add("active");
            current += 1;
            // onSuccess()
        }



});
var emp_past_employment_place = document.getElementById('past_employment_place')
emp_past_employment_place.oninput=function(){
    if((emp_past_employment_place.value).length >= 3){
        setSuccessFor(emp_past_employment_place);
    }if((emp_past_employment_place.value).length < 3){
        setDefaultFor(emp_past_employment_place,"please enter the valid reason")
    }if((emp_past_employment_place.value).length > 20){
        setErorFor(emp_past_employment_place,"you reach max length")
    }
}
 var emp_role = document.getElementById('role_selecter')
 emp_role.oninput=function(){
     if((emp_role.value).length >= 3){
        setSuccessFor(emp_role);
    }if((emp_role.value).length < 3){
        setDefaultFor(emp_role,"please enter the valid reason")
    }if((emp_role.value).length > 20){
        setErorFor(emp_role,"you reach max length")
    }
 };

 var emp_job_position = document.getElementById('job_position_selecter')
 emp_job_position.oninput=function(){
     if((emp_job_position.value).length >= 3){
        setSuccessFor(emp_job_position);
    }if((emp_job_position.value).length < 3){
        setDefaultFor(emp_job_position,"please enter the valid reason")
    }if((emp_job_position.value).length > 20){
        setErorFor(emp_job_position,"you reach max length")
    }
 };

 var teach_debut = document.getElementById('debut_as_a_teacher_val')
 teach_debut.oninput=function(){
      if((teach_debut.value).length >= 3){
        setSuccessFor(teach_debut);
    }if((teach_debut.value).length < 3){
        setDefaultFor(teach_debut,"please enter the valid reason")
    }if((teach_debut.value).length > 20){
        setErorFor(teach_debut,"you reach max length")
    }
 };

 var teach_field_of_study = document.getElementById('field_of_study_val')
 teach_field_of_study.oninput=function(){
       if((teach_field_of_study.value).length >= 3){
        setSuccessFor(teach_field_of_study);
    }if((teach_field_of_study.value).length < 3){
        setDefaultFor(teach_field_of_study,"please enter the valid reason")
    }if((teach_field_of_study.value).length > 20){
        setErorFor(teach_field_of_study,"you reach max length")
    }
 };
    var teach_place_of_study = document.getElementById('place_of_study_val')
    teach_place_of_study.oninput=function(){
         if((teach_place_of_study.value).length >= 3){
        setSuccessFor(teach_place_of_study);
    }if((teach_place_of_study.value).length < 3){
        setDefaultFor(teach_place_of_study,"please enter the valid reason")
    }if((teach_place_of_study.value).length > 20){
        setErorFor(teach_place_of_study,"you reach max length")
    }
    };

    var teach_date_of_study = document.getElementById('date_of_study_val')
    teach_date_of_study.oninput=function(){
        if((teach_date_of_study.value).length >= 3){
        setSuccessFor(teach_date_of_study);
    }if((teach_date_of_study.value).length < 3){
        setDefaultFor(teach_date_of_study,"please enter the valid reason")
    }if((teach_date_of_study.value).length > 20){
        setErorFor(teach_date_of_study,"you reach max length")
    }
    };
    var teach_traning_program = document.getElementById('teacher_traning_program_val')
    teach_traning_program.oninput=function(){
          if((teach_traning_program.value).length >= 3){
        setSuccessFor(teach_traning_program);
    }if((teach_traning_program.value).length < 3){
        setDefaultFor(teach_traning_program,"please enter the valid reason")
    }if((teach_traning_program.value).length > 20){
        setErorFor(teach_traning_program,"you reach max length")
    }
    };
    var teach_traning_year = document.getElementById('teacher_traning_year_val')
    teach_traning_year.oninput=function(){
         if((teach_traning_year.value).length >= 3){
        setSuccessFor(teach_traning_year);
    }if((teach_traning_year.value).length < 3){
        setDefaultFor(teach_traning_year,"please enter the valid reason")
    }if((teach_traning_year.value).length > 20){
        setErorFor(teach_traning_year,"you reach max length")
    }
    };
    var teach_traning_institiute = document.getElementById('teacher_traning_institute_val')
    teach_traning_institiute.oninput=function(){
            if((teach_traning_institiute.value).length >= 3){
        setSuccessFor(teach_traning_institiute);
    }if((teach_traning_institiute.value).length < 3){
        setDefaultFor(teach_traning_institiute,"please enter the valid reason")
    }if((teach_traning_institiute.value).length > 20){
        setErorFor(teach_traning_institiute,"you reach max length")
    }
    };

emp_nextBtnThird.addEventListener("click", function() {
    var emp_past_employment_place = document.getElementById('past_employment_place')
    var emp_role = document.getElementById('role_selecter')
    var emp_job_position = document.getElementById('job_position_selecter')
    var teach_debut = document.getElementById('debut_as_a_teacher_val')
    var teach_field_of_study = document.getElementById('field_of_study_val')
    var teach_place_of_study = document.getElementById('place_of_study_val')
    var teach_date_of_study = document.getElementById('date_of_study_val')
    var teach_traning_program = document.getElementById('teacher_traning_program_val')
    var teach_traning_year = document.getElementById('teacher_traning_year_val')
    var teach_traning_institiute = document.getElementById('teacher_traning_institute_val')

    if(emp_job_position.value.trim()=== '2'){


    if( emp_past_employment_place.value.length < 3){
        setDefaultFor( emp_past_employment_place,"employee role can not be min length")
    }else{
        setSuccessFor( emp_past_employment_place)
    }

    if(emp_role.value.trim() === ''){
        setDefaultFor(emp_role,"employee role can not be min length")
    }else{
        setSuccessFor(emp_role)
    }

    if(emp_job_position.value.trim() === ''){
        setDefaultFor(emp_job_position,"job position can not be min length")
    }else{
        setSuccessFor(emp_job_position)
    }

    }else{

    }



    if(teach_debut.value.length<3){
        setDefaultFor(teach_debut,"teacher debut day can not be min length")
    }else{
        setSuccessFor(teach_debut)
    }

    if(teach_field_of_study.value.length<3){
        setDefaultFor(teach_field_of_study,"field of study can not be min length")
    }else{
        setSuccessFor(teach_field_of_study)
    }

    if(teach_place_of_study.value.length<3){
        setDefaultFor(teach_place_of_study,"place of study can not be min length")
    }else{
        setSuccessFor(teach_place_of_study)
    }

    if(teach_date_of_study.value.length<3){
        setErorFor(teach_date_of_study,"date of study can not be min length")
    }else{
        setSuccessFor(teach_date_of_study)
    }

    if(teach_traning_program.value.length<3){
        setDefaultFor(teach_traning_program,"teacher trainning program can not be min length")
    }else{
        setSuccessFor(teach_traning_program)
    }

    if(teach_traning_year.value.length<3){
        setErorFor(teach_traning_year,"teacher trainning year can not be min length")
    }else{
        setSuccessFor(teach_traning_year)
    }

    if(teach_traning_institiute.value.length<3){
        setDefaultFor(teach_traning_institiute,"teacher trainning institute can not be min length")
    }else{
        setSuccessFor(teach_traning_institiute)
    }


    if(
       emp_past_employment_place.value.length < 3||
        emp_role.value.trim() === '' ||
        emp_job_position.value.trim() === '' ||
        teach_debut.value.length < 3 ||
        teach_field_of_study.value.length < 3 ||
        teach_place_of_study.value.length < 3 ||
        teach_date_of_study.value.length < 3 ||
        teach_traning_program.value.length < 3 ||
        teach_traning_year.value.length < 3 ||
        teach_traning_institiute.value.length < 3

    ){
        // setEror()
    }else{
        // onSuccess()
            emp_slidePage.style.marginLeft = "-75%";
            bullet[current - 1].classList.add("active");
            progressText[current - 1].classList.add("active");
            progressCheck[current - 1].classList.add("active");
            current += 1;
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

var emp_city = document.getElementById('city')
emp_city.oninput=function(){
     if((emp_city.value).length >= 3){
        setSuccessFor(emp_city);
    }if((emp_city.value).length < 3){
        setDefaultFor(emp_city,"please enter the valid parent name")
    }if((emp_city.value).length > 20){
        setErorFor(emp_city,"you reach max length")
    }
};
var emp_sub_city = document.getElementById('sub_city')
sub_city.oninput=function(){
     if((sub_city.value).length >= 3){
        setSuccessFor(sub_city);
    }if((sub_city.value).length < 3){
        setDefaultFor(sub_city,"please enter the valid city")
    }if((sub_city.value).length > 20){
        setErorFor(sub_city,"you reach max length")
    }
};

emp_addBtn.addEventListener("click", function() {
    var emp_city = document.getElementById('city')
    var emp_sub_city = document.getElementById('sub_city')
    var emp_kebele = document.getElementById('kebele')
    var emp_house_number = document.getElementById('house_number')
    var emp_POBox = document.getElementById('POBox')
    var emp_email = document.getElementById('email')
    var emp_phone = document.getElementById('phone1')
    var emp_alt_phone = document.getElementById('phone2')
 if((emp_city.value).length<3){
        setDefaultFor(emp_city,"employee city can not be min length")

    }else{
        setSuccessFor(emp_city)
    }

    if((emp_sub_city.value).length<3){
        setDefaultFor(emp_sub_city,"employee sub city can not be min length")

    }else{
        setSuccessFor(emp_sub_city)
    }

    if(emp_kebele.value.trim() === ''){
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

    if(emp_phone.value.trim() === ''){
        setErorFor(emp_phone,"employee phone number can not be null")

    }else{
        setSuccessFor(emp_phone)
    }

    if(emp_alt_phone.value.trim()=== ''){
        setErorFor(emp_alt_phone,"employee phone number 2 can not be null")

    }

    if(
        emp_city.value.trim() === '' ||
        emp_sub_city.value.trim() === '' ||
        emp_kebele.value.trim() === '' ||
        emp_house_number.value.trim() === '' ||
        emp_POBox.value.trim() === '' ||
        emp_email.value.trim() === '' ||
        emp_phone.value.trim() === '' ||
        emp_alt_phone.value.trim() === ''
    ){
        // setEror()
    }else
    {
        // onSuccess()
            emp_slidePage.style.marginLeft = "-75%";
            bullet[current - 1].classList.add("active");
            progressText[current - 1].classList.add("active");
            progressCheck[current - 1].classList.add("active");
            current += 1;
            setTimeout(function() {
        alert("You're successfully inserted your data");
        location.reload();
    }, 800);
    }


});


const teacher = document.getElementById("job_position_selecter");

teacher.addEventListener("change", function(){
    console.log('Clicked')
    const place_of_study = document.getElementById('place_of_study');
    const teacher_traning_year = document.getElementById('teacher_traning_year');
    const debut_as_a_teacher = document.getElementById('debut_as_a_teacher');
    const date_of_study = document.getElementById('date_of_study');
    const teacher_traning_institute = document.getElementById('teacher_traning_institute');
    const field_of_study = document.getElementById('field_of_study');
    const teacher_traning_program = document.getElementById('teacher_traning_program');

    if(teacher.value==="1"){
        place_of_study.style.display = "block";
        teacher_traning_year.style.display = "block";
        debut_as_a_teacher.style.display = "block";
        teacher_traning_institute.style.display = "block";
        date_of_study.style.display = "block";
        field_of_study.style.display = "block";
        teacher_traning_program.style.display = "block";

    }else{
        place_of_study.style.display = "none";
        teacher_traning_year.style.display = "none";
        debut_as_a_teacher.style.display = "none";
        teacher_traning_institute.style.display = "none";
        date_of_study.style.display = "none";
        field_of_study.style.display = "none";
        teacher_traning_program.style.display = "none";
    }

});
