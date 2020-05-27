var getId = () => {
  var category = document.getElementById('category').value;

  if (category == 'pop'){
    document.getElementById('epk_id').value = 1;
  } else if (category == "rap"){
    document.getElementById('epk_id').value = 2;
  } else if (category == "hardstyle"){
    document.getElementById('epk_id').value = 3;
  } else {
    document.getElementById('epk_id').value = 999;
  }
}

var setBackground = (value) => {
  if (value == 1) {
    document.getElementById("show-body").style.backgroundImage = "url('../images/background/background.gif')";
  } else if (value == 2) {
    document.getElementById("show-body").style.backgroundImage = "url('../images/background/background1.jpg')";
  } else if (value == 3){
    document.getElementById("show-body").style.backgroundImage = "url('../images/background/background2.jpg')";
  } else if (value == 4){
    document.getElementById("show-body").style.backgroundImage = "url('../images/background/background3.gif')";
  } else {
    document.getElementById("show-body").style.backgroundImage = "url('../images/background/background4.png')";
  }
}


var setTextColor = (value) => {
  switch (value) {
    case 1:
      document.getElementById("show-body").style.color = "black";
      break;
    case 2:
      document.getElementById("show-body").style.color = "white";
      break;
    case 3:
      document.getElementById("show-body").style.color = "green";
      break;
    case 4:
      document.getElementById("show-body").style.color = "orange";
      break;
    default:
      document.getElementById("show-body").style.color = "red";
  }
}
