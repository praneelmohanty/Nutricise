function calculateBMI() {
  const weightInput = document.getElementById("weight");
  const heightInput = document.getElementById("height");
  const resultDiv = document.getElementById("result");

  const weight = parseFloat(weightInput.value);
  const height = parseFloat(heightInput.value);

  weightInput.placeholder = "Enter Weight (kg)";
  heightInput.placeholder = "Enter Height (m)";
  resultDiv.textContent = "";

  if (!weight || weight <= 0 || !height || height <= 0) {
    resultDiv.textContent =
      "Please enter valid positive values for both weight and height.";
    return;
  }

  if (weight < 20) {
    weightInput.value = "";
    weightInput.placeholder = "⚠️ Weight must be at least 20kg!";
    resultDiv.textContent = "Weight too low!";
    return;
  }

  if (height > 2.8 || height < 0.5) {
    heightInput.value = "";
    heightInput.placeholder = "⚠️ Enter a Valid Height!!";
    resultDiv.textContent = "Invalid height!";
    return;
  }
  const bmi = (weight / (height * height)).toFixed(2);
  resultDiv.textContent = `Your BMI is ${bmi}.`;
  resultDiv.style.fontFamily = "Poppins, sans-serif";

  document.getElementById("bmiValue").value = bmi;
}

