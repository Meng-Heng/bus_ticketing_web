/* 
    Write Vanilla JS script
    Use on Ticket form in home page 
*/

departureDate = document.getElementById("departure-date");
returnDate = document.getElementById("return-date");

// Validate current date for departure date and return date
// window.addEventListener("load", function() {
//     today = new Date();
//     year = today.getFullYear();
//     month = (today.getMonth() + 1).toString().padStart(2, '0')
//     day = today.getDate().toString().padStart(2, '0')

//     const currentDate = `${year}-${month}-${day}`;

//     let futureDate = "fromDB";

//     departureDate.setAttribute('min', currentDate)
//     departureDate.setAttribute('max', futureDate)
//     returnDate.setAttribute('disabled', true)

//     // Validate disabled selected date for return date 
//     departureDate.addEventListener("change", function() {
//         returnDate.removeAttribute('disabled', true)
//         departureData = departureDate.value.split('-')
//         year = departureData[0];
//         month = departureData[1];
//         day = departureData[2];
    
//         const departureSelectedDate = `${year}-${month}-${day}`;
    
//         let futureDate = "fromDB";
    
//         returnDate.setAttribute('min', departureSelectedDate)
//         returnDate.setAttribute('max', futureDate)
//     })

//     // Populate the Origin and Destination

// })

// Validate data when submit
function submitForm(e) {
    var origin = e.target.querySelector("[name=origin]").value;
    var destination = e.target.querySelector("[name=depart]").value;
    // let departuring = e.target.querySelector("[name=departure-date]").value;
    // let returning = e.target.querySelector("[name=return-date]").value;

    // splitDeparture = departuring.split('-')
    // departureDay = splitDeparture[0]
    // departureMonth = splitDeparture[1]
    // departureYear = splitDeparture[2]

    // splitReturn = returning.split('-')
    // returnDay = splitReturn[0]
    // returnMonth = splitReturn[1]
    // returnYear = splitReturn[2]

    // if (returnDay > departureDay) {
    //     alert("origin and destination can't be the same");
    // }

    if (origin == destination) {
        e.stopPropagation()
        e.preventDefault()
        alert("origin and destination can't be the same");
        return false;
    } else {
        return true;
    }
}