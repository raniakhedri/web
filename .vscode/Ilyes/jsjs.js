var slider = document.querySelector('.slider');
var sliderWidth = slider.offsetWidth;
var prevBtn = document.querySelector('.prev');
var nextBtn = document.querySelector('.next');
var slideIndex = 0;

nextBtn.addEventListener('click', function() {
  slideIndex++;
  slide();
});

prevBtn.addEventListener('click', function() {
  slideIndex--;
  slide();
});

function slide() {
  var sliderList = slider.querySelector('ul');
  if (slideIndex < 0) {
    slideIndex = sliderList.children.length - 1;
  } else if (slideIndex >= sliderList.children.length) {
    slideIndex = 0;
  }
  sliderList.style.transform = 'translateX(-' + slideIndex * sliderWidth + 'px)';
}
function getCurrentDateTime() {
  const currentDate = new Date();
  const dateTimeString = currentDate.toLocaleString();
  document.getElementById("currentDateTime").innerHTML = dateTimeString;
}

// call the function to display the date and time on page load
getCurrentDateTime();

function toggleSection() {
  const section = document.getElementById("mySection");
  if (section.style.display === "none") {
    section.style.display = "block";
  } else {
    section.style.display = "none";
  }
}
function validateForm() {
  const nameInput = document.getElementById("name");
  const emailInput = document.getElementById("email");
  const messageInput = document.getElementById("message");

  if (nameInput.value === "" || emailInput.value === "" || messageInput.value === "") {
    alert("Please fill in all fields");
    return false;
  }

  if (!emailInput.checkValidity()) {
    alert("Please enter a valid email address");
    return false;
  }

  return true;
}
const zoomImage = document.querySelector('.zoom-image');

zoomImage.addEventListener('mousemove', (e) => {
  const width = zoomImage.offsetWidth;
  const height = zoomImage.offsetHeight;
  const mouseX = e.offsetX;
  const mouseY = e.offsetY;
  const xPos = (mouseX / width) * 100;
  const yPos = (mouseY / height) * 100;

  zoomImage.style.backgroundPosition = `${xPos}% ${yPos}%`;
  zoomImage.style.backgroundSize = '250%';
});

zoomImage.addEventListener('mouseleave', () => {
  zoomImage.style.backgroundPosition = 'center';
  zoomImage.style.backgroundSize = 'cover';
});
