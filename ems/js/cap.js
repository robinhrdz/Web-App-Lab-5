document.getElementById("refresh").addEventListener("click", function(){
    document.getElementById("captcha-img").src = "captcha.php?" + new Date().getTime();
  });
  