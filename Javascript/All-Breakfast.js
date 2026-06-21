function showFoodOptions() {
  let foodType = document.getElementById("foodType").value;
  let foodDropdown = document.getElementById("foodDropdown");
  let foodChoice = document.getElementById("foodChoice");

  foodChoice.innerHTML = ""; 

  fetch("../Php/All-Breakfast.php") 
    .then(response => response.json())
    .then(data => {
      let vegOptions = data.veg;      
      let nonVegOptions = data.nonveg; 

      let options = foodType === "veg" ? vegOptions : nonVegOptions;
      
      for (let link in options) {
        let option = document.createElement("option");
        option.value = link; 
        option.textContent = options[link]; 
        foodChoice.appendChild(option);
      }

      foodDropdown.style.display = "block"; 
    })
    .catch(error => console.error("Error fetching food options:", error));
}

function goToFoodPage() {
  let selectedFood = document.getElementById("foodChoice").value;
  if (selectedFood) {
    window.location.href = selectedFood;
  }
}

