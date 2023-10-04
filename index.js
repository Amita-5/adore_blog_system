document.querySelector("#entry").addEventListener("click", function(){
    document.querySelector(".container").style.display = "block";
});

document.querySelector(".close").addEventListener("click", function(){
    document.querySelector(".container").style.display = "none";
});

document.querySelector("#submit").addEventListener("click", function(){
    document.querySelector(".container").style.display = "none";
});
