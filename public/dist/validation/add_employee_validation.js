



const slidePage = document.querySelector(".slidePage");
const firstNextBtn = document.querySelector(".Emp_nextBtn");
const prevBtnSec = document.querySelector(".Emp_prev-1");
const nextBtnSec = document.querySelector(".Emp_next-1");
const prevBtnThird = document.querySelector(".Emp_prev-2");
const nextBtnThird = document.querySelector(".Emp_next-2");
const prevBtnFourth = document.querySelector(".Emp_prev-3");
const addBtn = document.querySelector(".submitBtn");

firstNextBtn.addEventListener("click", function(){
    var emp_first_name = document.getElementById('first_name')
    var emp_middle_name = document.getElementById('middle_name')
    var emp_last_name = document.getElementById('last_name')
    var emp_birth_date = document.getElementById('birth_date')
    var emp_gender = document.getElementById('gender')
    var emp_marriage_status = document.getElementById('marriage_status')
    var emp_citizen = document.getElementById('education_status')
    var emp_education_status = document.getElementById('citizen')
    var emp_hired_date = document.getElementById('hired_date')

    if(emp_first_name.value.trim() === ''){
        setErorFor(emp_first_name,"First Name can not be empty")
    }else{
        setSuccessFor(emp_first_name)
    }

       if(emp_middle_name.value.trim() === ''){
        setErorFor(emp_middle_name,"Middle name can not be empty")
    }else{
        setSuccessFor(emp_middle_name)
    }

         if(emp_last_name.value.trim() === ''){
        setErorFor(emp_last_name,"Last name can not be empty")
    }else{
        setSuccessFor(emp_last_name)
    }

       if(emp_birth_date.value.trim() === ''){
        setErorFor(emp_birth_date,"Birth date can not be empty")
    }else{
        setSuccessFor(emp_birth_date)
    }

      if(emp_gender.value.trim() === ''){
        setErorFor(emp_gender,"Gender can not be empty")
    }else{
        setSuccessFor(emp_gender)
    }

     if(emp_marriage_status.value.trim() === ''){
        setErorFor(emp_marriage_status,"Marriage status can not be empty")
    }else{
        setSuccessFor(emp_marriage_status)
    }

     if(emp_citizen.value.trim() === ''){
        setErorFor(emp_citizen,"Citizenship can not be empty")
    }else{
        setSuccessFor(emp_citizen)
    }

    if(emp_education_status.value.trim() === ''){
        setErorFor(emp_education_status,"Education status can not be empty")
    }else{
        setSuccessFor(emp_education_status)
    }

    if(emp_hired_date.value.trim() === ''){
        setErorFor(emp_hired_date,"Hired date can not be empty")
    }else{
        setSuccessFor(emp_hired_date)
    }


    if(
        emp_first_name.value.trim() === '' ||
        emp_middle_name.value.trim() === '' ||
        emp_last_name.value.trim() === '' ||
        emp_birth_date.value.trim() === '' ||
        emp_gender.value.trim() === '' ||
        emp_marriage_status.value.trim() === '' ||
        emp_citizen.value.trim() === '' ||
        emp_education_status.value.trim() === '' ||
        emp_hired_date.value.trim() === ''
        ){
            // setErorFor(emp_first_name,"First Name is not")
            // setErorFor(emp_middle_name,"Middle Name is Not Found")
            // setErorFor(emp_last_name,"Last Name is Not Found")
        //setEror()
    }else{

         slidePage.style.marginLeft = "-25%";
            bullet[current - 1].classList.add("active");
            progressText[current - 1].classList.add("active");
            progressCheck[current - 1].classList.add("active");
            current += 1;
        // onSuccess()
    }
})

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

prevBtnSec.addEventListener("click", function() {
    slidePage.style.marginLeft = "0%";
    bullet[current - 2].classList.remove("active");
    progressText[current - 2].classList.remove("active");
    progressCheck[current - 2].classList.remove("active");
    current -= 1;
});
nextBtnSec.addEventListener("click", function() {

        var emp_job_trainning = document.getElementById('job_trainning')
        var emp_previous_employment = document.getElementById('previous_employment')
        var emp_special_skill = document.getElementById('special_skill')
        var emp_net_salary = document.getElementById('net_salary')
        var emp_hire_type = document.getElementById('hire_type')
        var emp_religion = document.getElementById('employee_religion')
        var emp_emergency_contact = document.getElementById('emergency_contact')
        var emp_relation = document.getElementById('relation')
        var emp_past_job_position = document.getElementById('past_job_position')

        if(emp_job_trainning.value.trim() === ''){
        setErorFor(emp_job_trainning,"job trainning can not be empty")
    }else{
        setSuccessFor(emp_job_trainning)
    }

      if(emp_previous_employment.value.trim() === ''){
        setErorFor(emp_previous_employment,"previous employment can not be empty")
    }else{
        setSuccessFor(emp_previous_employment)
    }

     if(emp_special_skill.value.trim() === ''){
        setErorFor(emp_special_skill,"special skill can not be empty")
    }else{
        setSuccessFor(emp_special_skill)
    }

      if(emp_net_salary.value.trim() === ''){
        setErorFor(emp_net_salary,"net salary can not be empty")
    }else{
        setSuccessFor(emp_net_salary)
    }

     if(emp_hire_type.value.trim() === ''){
        setErorFor(emp_hire_type,"hire type can not be empty")
    }else{
        setSuccessFor(emp_hire_type)
    }

    if(emp_religion.value.trim() === ''){
        setErorFor(emp_religion,"employee religion can not be empty")
    }else{
        setSuccessFor(emp_religion)
    }

    if(emp_emergency_contact.value.trim() === ''){
        setErorFor(emp_emergency_contact,"emergency contact can not be empty")
    }else{
        setSuccessFor(emp_emergency_contact)
    }

    if(emp_relation.value.trim() === ''){
        setErorFor(emp_relation,"employee relation can not be empty")
    }else{
        setSuccessFor(emp_relation)
    }

    if(emp_past_job_position.value.trim() === ''){
        setErorFor(emp_past_job_position,"past job position can not be empty")
    }else{
        setSuccessFor(emp_past_job_position)
    }

        if(
              emp_job_trainning.value.trim() === '' ||
              emp_previous_employment.value.trim() === '' ||
              emp_special_skill.value.trim() === '' ||
              emp_net_salary.value.trim() === '' ||
              emp_hire_type.value.trim() === '' ||
              emp_religion.value.trim() === '' ||
              emp_emergency_contact.value.trim() === '' ||
              emp_relation.value.trim() === '' ||
              emp_past_job_position.value.trim() === '' 
        ){
                // setEror()
        }else
        {
            slidePage.style.marginLeft = "-50%";
            bullet[current - 1].classList.add("active");
            progressText[current - 1].classList.add("active");
            progressCheck[current - 1].classList.add("active");
            current += 1;
            // onSuccess()
        }


    
});

nextBtnThird.addEventListener("click", function() {

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

    if(emp_job_position.value.trim()=== '8'){

        if(emp_past_employment_place.value.trim() === ''){
        setErorFor(emp_past_employment_place,"past employment can not be empty")
    }else{
        setSuccessFor(emp_past_employment_place)
    }

    if(emp_role.value.trim() === ''){
        setErorFor(emp_role,"employee role can not be empty")
    }else{
        setSuccessFor(emp_role)
    }

    if(emp_job_position.value.trim() === ''){
        setErorFor(emp_job_position,"job position can not be empty")
    }else{
        setSuccessFor(emp_job_position)
    }

    }else{

    }

    

    if(teach_debut.value.trim() === ''){
        setErorFor(teach_debut,"teacher debut day can not be empty")
    }else{
        setSuccessFor(teach_debut)
    }

    if(teach_field_of_study.value.trim() === ''){
        setErorFor(teach_field_of_study,"field of study can not be empty")
    }else{
        setSuccessFor(teach_field_of_study)
    }

    if(teach_place_of_study.value.trim() === ''){
        setErorFor(teach_place_of_study,"place of study can not be empty")
    }else{
        setSuccessFor(teach_place_of_study)
    }

    if(teach_date_of_study.value.trim() === ''){
        setErorFor(teach_date_of_study,"date of study can not be empty")
    }else{
        setSuccessFor(teach_date_of_study)
    }

    if(teach_traning_program.value.trim() === ''){
        setErorFor(teach_traning_program,"teacher trainning program can not be empty")
    }else{
        setSuccessFor(teach_traning_program)
    }

    if(teach_traning_year.value.trim() === ''){
        setErorFor(teach_traning_year,"teacher trainning year can not be empty")
    }else{
        setSuccessFor(teach_traning_year)
    }

    if(teach_traning_institiute.value.trim() === ''){
        setErorFor(teach_traning_institiute,"teacher trainning institute can not be empty")
    }else{
        setSuccessFor(teach_traning_institiute)
    }


    if(
        
        emp_past_employment_place.value.trim() === '' ||
        emp_role.value.trim() === '' ||
        emp_job_position.value.trim() === '' ||
        teach_debut.value.trim() === '' ||
        teach_field_of_study.value.trim() === '' ||
        teach_place_of_study.value.trim() === '' ||
        teach_date_of_study.value.trim() === '' ||
        teach_traning_program.value.trim() === '' ||
        teach_traning_year.value.trim() === '' ||
        teach_traning_institiute.value.trim() === '' 

    ){
        // setEror()
    }else{
        // onSuccess()
            slidePage.style.marginLeft = "-75%";
            bullet[current - 1].classList.add("active");
            progressText[current - 1].classList.add("active");
            progressCheck[current - 1].classList.add("active");
            current += 1;
    }
  
});

prevBtnThird.addEventListener("click", function() {
    slidePage.style.marginLeft = "-25%";
    bullet[current - 2].classList.remove("active");
            progressText[current - 2].classList.remove("active");
            progressCheck[current - 2].classList.remove("active");
            current -= 1;
});
prevBtnFourth.addEventListener("click", function() {
    slidePage.style.marginLeft = "-50%";
    bullet[current - 2].classList.remove("active");
    progressText[current - 2].classList.remove("active");
    progressCheck[current - 2].classList.remove("active");
    current -= 1;
});
addBtn.addEventListener("click", function() {
    var emp_city = document.getElementById('city')
    var emp_sub_city = document.getElementById('sub_city')
    var emp_kebele = document.getElementById('kebele')
    var emp_house_number = document.getElementById('house_number')
    var emp_POBox = document.getElementById('POBox')
    var emp_email = document.getElementById('email')
    var emp_phone = document.getElementById('phone1')
    var emp_alt_phone = document.getElementById('phone2')

    if(emp_city.value.trim() === ''){
        setErorFor(emp_city,"city can not be empty")
    }else{
        setSuccessFor(emp_city)
    }

    if(emp_sub_city.value.trim() === ''){
        setErorFor(emp_sub_city,"sub city can not be empty")
    }else{
        setSuccessFor(emp_sub_city)
    }

    if(emp_kebele.value.trim() === ''){
        setErorFor(emp_kebele,"kebele can not be empty")
    }else{
        setSuccessFor(emp_kebele)
    }

    if(emp_house_number.value.trim() === ''){
        setErorFor(emp_house_number,"house number can not be empty")
    }else{
        setSuccessFor(emp_house_number)
    }

    if(emp_POBox.value.trim() === ''){
        setErorFor(emp_POBox,"posta box can not be empty")
    }else{
        setSuccessFor(emp_POBox)
    }

    if(emp_email.value.trim() === ''){
        setErorFor(emp_email,"email can not be empty")
    }else{
        setSuccessFor(emp_email)
    }

    if(emp_phone.value.trim() === ''){
        setErorFor(emp_phone,"phone number can not be empty")
    }else{
        setSuccessFor(emp_phone)
    }

    if(emp_alt_phone.value.trim() === ''){
        setErorFor(emp_alt_phone,"phone number can not be empty")
    }else{
        setSuccessFor(emp_alt_phone)
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
            slidePage.style.marginLeft = "-75%";
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