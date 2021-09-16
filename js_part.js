

document.querySelector('#btnSubmit').onclick=function(e){
    let Y = document.querySelector('#y_text').value;
    let R = document.querySelector("input[type=radio]:checked").value
    let X = document.querySelector("option:checked").value

    if(checkText(Y)){
        fetch("script.php",
        {
        method: "POST",
        headers: {
        'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: "x="+X+"&y="+Y+"&r="+R
        })
        .then(response => response.text())
        .then(response => document.getElementById("Answer").innerHTML = response);
    }
    
}
document.querySelector('#reset').onclick=function(e){
    e.preventDefault();
    fetch("clear.php")
        .then(response => response.text())
        .then(response => document.getElementById("Answer").innerHTML = response)
}

function checkText(Y){
    
    if (Y==null || Y.length == 0){
        alert("write something in the field");
        return false
    }
    else if (parseFloat(Y)<-3){
        alert("cant be less then -3");
        return false   
    }
    else if (parseFloat(Y)>3){
        alert("cant be higher then 3");
        return false
    }
    else if (isNaN(Y)){
        alert("must be a number");
        return false;
    }
    else{
        return true
    }
}
