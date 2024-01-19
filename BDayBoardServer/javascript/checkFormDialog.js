function validate(){
    let name = document.getElementsByName("childName_input");
    let time = document.getElementsByName("time_input");
    let day = document.getElementsByName("day_input");
    let theme = document.getElementsByName("theme_input");
    if(name == "" || time == "" || day == 0 || theme == ""){
        alert('Please fill all fields.');
        return false;
    }else{
        return true;
    }
}