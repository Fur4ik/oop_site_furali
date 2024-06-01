document.addEventListener("DOMContentLoaded", function() {
    var form = document.getElementById("registerForm");
    var modal = document.getElementById("errorModal");
    var span = document.getElementsByClassName("close")[0];
    var errorMessage = document.getElementById("errorMessage");
  
    form.onsubmit = function(event) {
      event.preventDefault();
  
      var xhr = new XMLHttpRequest();
      xhr.open("POST", form.action, true);
      xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
  
      xhr.onreadystatechange = function() {
        if (xhr.readyState === 4) {
          if (xhr.status === 200) {
            if (xhr.responseText.indexOf("Ошибка") !== -1) {
              errorMessage.textContent = xhr.responseText;
              modal.style.display = "block";
            } else {
                var form = document.getElementById('registerForm');
                form.reset();
                document.querySelector(".card-toggle").click();
            }
          } else {
            errorMessage.textContent = "Произошла ошибка при отправке формы.";
            modal.style.display = "block";
          }
        }
      };
  
      var formData = new FormData(form);
      var urlEncodedData = "";
      var urlEncodedDataPairs = [];
      for (var pair of formData.entries()) {
        urlEncodedDataPairs.push(encodeURIComponent(pair[0]) + '=' + encodeURIComponent(pair[1]));
      }
      urlEncodedData = urlEncodedDataPairs.join('&');
      
      xhr.send(urlEncodedData);
    };
  
    span.onclick = function() {
      modal.style.display = "none";
    };
  
    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    };
  });