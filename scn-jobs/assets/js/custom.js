// navbarrr js=====================================================
const navEl = document.querySelector('.navbar-01');

window.addEventListener('scroll', () => {
    if (window.scrollY >= 56) {
        navEl.classList.add('navbar-scrolled');
    } else if (window.scrollY < 56) {
        navEl.classList.remove('navbar-scrolled');
    }
});


// slider start js===================================================

$('.testi-slide').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:1
        },
        1000:{
            items:2
        }
    }
})

// aos stsrt here 
AOS.init();

// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@city and state @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

$(document).ready(function() {
    var stateObject = {
        "andhra_pradesh": ["Visakhapatnam", "Vijayawada", "Guntur"],
        "arunachal_pradesh": ["Itanagar", "Naharlagun", "Tawang"],
        "assam": ["Guwahati", "Dibrugarh", "Silchar"],
        "bihar": ["Patna", "Gaya", "Bhagalpur"],
        "chhattisgarh": ["Raipur", "Bhilai", "Bilaspur"],
        "goa": ["Panaji", "Margao", "Vasco da Gama"],
        "gujarat": ["Ahmedabad", "Surat", "Vadodara"],
        "haryana": ["Chandigarh", "Gurugram", "Faridabad"],
        "himachal_pradesh": ["Shimla", "Manali", "Dharamshala"],
        "jharkhand": ["Ranchi", "Jamshedpur", "Dhanbad"],
        "karnataka": ["Bengaluru", "Mysuru", "Mangaluru"],
        "kerala": ["Thiruvananthapuram", "Kochi", "Kozhikode"],
        "madhya_pradesh": ["Bhopal", "Indore", "Gwalior"],
        "maharashtra": ["Mumbai", "Pune", "Nagpur"],
        "manipur": ["Imphal", "Thoubal", "Bishnupur"],
        "meghalaya": ["Shillong", "Tura", "Jowai"],
        "mizoram": ["Aizawl", "Lunglei", "Saiha"],
        "nagaland": ["Kohima", "Dimapur", "Mokokchung"],
        "odisha": ["Bhubaneswar", "Cuttack", "Rourkela"],
        "punjab": ["Chandigarh", "Ludhiana", "Amritsar"],
        "rajasthan": ["Jaipur", "Jodhpur", "Udaipur"],
        "sikkim": ["Gangtok", "Namchi", "Gyalshing"],
        "tamil_nadu": ["Chennai", "Coimbatore", "Madurai"],
        "telangana": ["Hyderabad", "Warangal", "Nizamabad"],
        "tripura": ["Agartala", "Udaipur", "Dharmanagar"],
        "uttar_pradesh": ["Lucknow", "Kanpur", "Varanasi"],
        "uttarakhand": ["Dehradun", "Nainital", "Haridwar"],
        "west_bengal": ["Kolkata", "Howrah", "Darjeeling"]
    };

    $('#state').change(function() {
        var state = $(this).val();
        var cities = stateObject[state];
        $('#city').html('<option value="">Select City</option>');

        if (cities) {
            $.each(cities, function(index, value) {
                $('#city').append('<option value="' + value + '">' + value + '</option>');
            });
        }
    });

    $('#city').change(function() {
        alert('Selected city: ' + $(this).val());
    });
});

// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@city and state @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

$(document).ready(function() {
    var stateObject = {
        "andhra_pradesh": ["Visakhapatnam", "Vijayawada", "Guntur"],
        "arunachal_pradesh": ["Itanagar", "Naharlagun", "Tawang"],
        "assam": ["Guwahati", "Dibrugarh", "Silchar"],
        "bihar": ["Patna", "Gaya", "Bhagalpur"],
        "chhattisgarh": ["Raipur", "Bhilai", "Bilaspur"],
        "goa": ["Panaji", "Margao", "Vasco da Gama"],
        "gujarat": ["Ahmedabad", "Surat", "Vadodara"],
        "haryana": ["Chandigarh", "Gurugram", "Faridabad"],
        "himachal_pradesh": ["Shimla", "Manali", "Dharamshala"],
        "jharkhand": ["Ranchi", "Jamshedpur", "Dhanbad"],
        "karnataka": ["Bengaluru", "Mysuru", "Mangaluru"],
        "kerala": ["Thiruvananthapuram", "Kochi", "Kozhikode"],
        "madhya_pradesh": ["Bhopal", "Indore", "Gwalior"],
        "maharashtra": ["Mumbai", "Pune", "Nagpur"],
        "manipur": ["Imphal", "Thoubal", "Bishnupur"],
        "meghalaya": ["Shillong", "Tura", "Jowai"],
        "mizoram": ["Aizawl", "Lunglei", "Saiha"],
        "nagaland": ["Kohima", "Dimapur", "Mokokchung"],
        "odisha": ["Bhubaneswar", "Cuttack", "Rourkela"],
        "punjab": ["Chandigarh", "Ludhiana", "Amritsar"],
        "rajasthan": ["Jaipur", "Jodhpur", "Udaipur"],
        "sikkim": ["Gangtok", "Namchi", "Gyalshing"],
        "tamil_nadu": ["Chennai", "Coimbatore", "Madurai"],
        "telangana": ["Hyderabad", "Warangal", "Nizamabad"],
        "tripura": ["Agartala", "Udaipur", "Dharmanagar"],
        "uttar_pradesh": ["Lucknow", "Kanpur", "Varanasi"],
        "uttarakhand": ["Dehradun", "Nainital", "Haridwar"],
        "west_bengal": ["Kolkata", "Howrah", "Darjeeling"]
    };

    $('#state').change(function() {
        var state = $(this).val();
        var cities = stateObject[state];
        $('#address-city').html('<option value="">Select City</option>');

        if (cities) {
            $.each(cities, function(index, value) {
                $('#address-city').append('<option value="' + value + '">' + value + '</option>');
            });
        }
    });

    $('#address-city').change(function() {
        alert('Selected city: ' + $(this).val());
    });
});

//   @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@Qualification js@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@

var qualificationTypeSelect = document.getElementById("QUALIFICATION-type");
var qualificationSelect = document.getElementById("Qualification");

// Add event listener to the Qualification Type select element
qualificationTypeSelect.addEventListener("change", function() {
    // Clear existing options
    qualificationSelect.innerHTML = "<option value=''>Select QUALIFICATION</option>";

    // Get the selected value of the Qualification Type select element
    var selectedValue = qualificationTypeSelect.value;

    // Define options based on the selected value
    var options = [];
    switch(selectedValue) {
        case "1":
            options = ["BSc", "BTech", "BBA", "BCA"];
            break;
        case "2":
            options = ["MSc", "MTech", "MBA", "MCA"];
            break;
        case "3":
            options = ["Diploma in Engineering", "Diploma in Management", "Diploma in Arts"];
            break;
        case "4":
            options = ["SSLC", "CBSE", "ICSE"];
            break;
        case "5":
            options = ["HSC", "CBSE", "ISC"];
            break;
        case "9":
            options = ["CFA", "CPA", "CIMA"];
            break;
        case "10":
            options = ["BSc", "BTech", "BBA", "BCA", "MSc", "MTech", "MBA", "MCA", "Diploma in Engineering", "Diploma in Management", "Diploma in Arts"];
            break;
        case "11":
            options = ["Any Graduate"];
            break;
        case "12":
            options = ["Any Can Apply"];
            break;
        default:
            options = [];
            break;
    }

    // Populate the QUALIFICATION select element with the options
    options.forEach(function(option) {
        var optionElement = document.createElement("option");
        optionElement.value = option;
        optionElement.textContent = option;
        qualificationSelect.appendChild(optionElement);
    });
});




// /@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@/ Initialize tooltips@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
$(function () {
    $('[data-toggle="tooltip"]').tooltip()
  })


//    e@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ Fresher and experience candidate ###################################
  $(document).ready(function(){
    $('#status').change(function(){
      if($(this).val() === 'experience') {
        $('.experience-fields').slideDown();
      } else {
        $('.experience-fields').slideUp();
      }
    });
  });
  document.addEventListener("DOMContentLoaded", function () {
    const statusSelect = document.getElementById("status");
    const experienceFields = document.querySelector(".experience-fields");

    statusSelect.addEventListener("change", function () {
        if (statusSelect.value === "experience") {
            experienceFields.style.display = "block";
        } else {
            experienceFields.style.display = "none";
        }
    });
});





// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ handle resume upload @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
   function uploadResume() {
    var fileInput = document.getElementById('resumeInput');
    var resumeDisplay = document.getElementById('resumeDisplay');

    // Get the selected file
    var file = fileInput.files[0];

    // Show the file name in the display area
    resumeDisplay.textContent = "Uploaded Resume: " + file.name;
    resumeDisplay.style.display = 'block';
}

// Function to view the uploaded resume
function viewResume() {
    var fileInput = document.getElementById('resumeInput');
    var resumeDisplay = document.getElementById('resumeDisplay');

    // Check if a file is uploaded
    if (fileInput.files.length > 0) {
        // Get the selected file
        var file = fileInput.files[0];

        // Check if the file is a PDF
        if (file.type === 'application/pdf') {
            // Display PDF using <embed> tag
            resumeDisplay.innerHTML = "<embed src='" + URL.createObjectURL(file) + "' width='500' height='600'>";
        } else {
            // Display a message for non-PDF files
            resumeDisplay.textContent = "Only PDF files can be viewed.";
        }
    } else {
        // Display a message if no file is uploaded
        resumeDisplay.textContent = "Please upload a resume first.";
    }
}





// @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@ profile updete js @@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@
document.addEventListener("DOMContentLoaded", function () {
    const profileImgInput = document.getElementById("profileImg");
    const uploadBtn = document.getElementById("uploadBtn");
    const profileImgContainer = document.getElementById("profileImgContainer");
    const profileImage = document.getElementById("profileImage");
    const changeImgBtn = document.getElementById("changeImgBtn");

    uploadBtn.addEventListener("click", function () {
        const file = profileImgInput.files[0];
        if (file) {
            const fileURL = URL.createObjectURL(file);
            profileImage.src = fileURL;
            profileImgContainer.style.display = "block";
            uploadBtn.style.display = "none"; // Hide the upload button
            profileImgInput.style.display = "none"; // Hide the file input
        }
    });

    changeImgBtn.addEventListener("click", function () {
        profileImgInput.value = ""; // Clear the input value
        profileImgContainer.style.display = "none"; // Hide the image container
        profileImage.src = ""; // Remove the image src
        uploadBtn.style.display = "block"; // Show the upload button
        profileImgInput.style.display = "block"; // Show the file input
    });
});




//@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@@2 multislect #############################################

$(document).ready(function() {
    $('#city').select2({
        placeholder: 'Select preferred job locations',
        width: '100%',
      
    });
});



    $(document).ready(function() {
        $('#skills').select2({
            placeholder: 'select skills',
            width: '100%'
        });
    });




    function resetForm() {
        document.getElementById("searchForm").reset();
    }