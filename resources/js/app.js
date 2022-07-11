import axios from "axios";
import Chart from "chart.js/auto";
import swal from "sweetalert";
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */
require("./bootstrap");
/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

require("./components/Example");

// EMAILJS
$(document).ready(function () {
    emailjs.init("NsJNEo48RRmrE8B2_");
});

$("#emailSubmitButton").click(function () {
    const sender = $("#emailSender").val();
    const message = $("#emailMessage").val();
    const subject = $("#emailSubject").val();

    const templateParams = {
        from_name: sender,
        subject: subject,
        message: message,
    };

    emailjs
        .send("service_7s294hs", "template_6kpirrn", templateParams)
        .then((response) => {
            const newForm = new FormData();
            newForm.append("email", sender);
            axios
                .post("/addemailsent", newForm)
                .then((response) => {
                    console.log(response.data);
                })
                .catch((e) => {
                    console.log(e);
                });
            swal({
                icon: "success",
                title: "Email Sent!",
                text: "The email has been sent succesfully!",
                buttons: false,
            }).then((response) => {
                $("#emailSender").val("");
                $("#emailMessage").val("");
                $("#emailSubject").val("");
            });
        })
        .catch((e) => {
            swal({
                icon: "error",
                title: "Email not Sent!",
                text: "An error has occurred while sending the email!",
                buttons: false,
            });
        });
});

$("#loginButton").click(function () {
    const formdata = new FormData();
    const email = $("#email").val();
    const password = $("#password").val();
    formdata.append("email", email);
    formdata.append("password", password);
    axios
        .post("/checkcreds", formdata)
        .then((response) => {
            if (response.data == "Wrong Credentials") {
                $("#errorHelper").removeClass("hidden");
            } else {
                $("#errorHelper").addClass("hidden");
                axios.post("/login", formdata).then((response) => {
                    location.reload();
                });
            }
        })
        .catch((e) => {
            console.log(e);
        });
});

let isDragging = false;
$("body")
    .mousedown(function () {
        isDragging = false;
    })
    .mousemove(function () {
        isDragging = true;
    })
    .mouseup(function () {
        let wasDragging = isDragging;
        isDragging = false;
        if (!wasDragging) {
        }
    });

// const labels = [
//     "Monday",
//     "Tuesday",
//     "Wednesday",
//     "Thursday",
//     "Friday",
//     "Saturday",
//     "Sunday",
// ];

// const data = {
//     labels: labels,
//     datasets: [
//         {
//             label: "Emails Received",
//             backgroundColor: "rgb(255, 99, 132)",
//             borderColor: "rgb(255, 99, 132)",
//             data: [0, 10, 5, 2, 20, 30, 45],
//         },
//     ],
// };

// const config = {
//     type: "line",
//     data: data,
//     options: {},
// };

// const emailChart = new Chart($("#emailChart"), config);

// const visitorsData = {
//     labels: labels,
//     datasets: [
//         {
//             label: "Number of Visitors per Day",
//             backgroundColor: "rgb(132, 99, 255)",
//             borderColor: "rgb(132, 99, 255)",
//             data: [3, 15, 12, 20, 30, 45, 70],
//         },
//     ],
// };

// const visitorsConfig = {
//     type: "line",
//     data: visitorsData,
//     options: {},
// };

// const visitorsChart = new Chart($("#visitorsChart"), visitorsConfig);

//ADDING CERTIFICATIONS
$("#submitCertification").click(function () {
    const title = $("#certificationTitle").val();
    const desc = $("#certificationDescription").val();

    if (title == "" || desc == "") {
        swal({
            icon: "error",
            title: "Error!",
            text: "Some fields are not properly filled!",
            buttons: false,
        });
    } else {
        swal({
            icon: "warning",
            title: "Warning!",
            text: "Are you sure you want to add a certification?",
            buttons: {
                cancel: "Cancel",
                true: "OK",
            },
        }).then((response) => {
            if (response == "true") {
                swal({
                    icon: "success",
                    title: "Success!",
                    text: "The certification has been added!",
                    buttons: false,
                }).then((response) => {
                    const formdata = new FormData();
                    formdata.append("title", title),
                        formdata.append("description", desc);
                    axios
                        .post("/addcertification", formdata)
                        .then((response) => {
                            location.reload();
                        });
                });
            }
        });
    }
});

//ADD PROJECT

$("#submitProject").click(function () {
    const title = $("#projectTitle").val();
    const description = $("#projectDescription").val();
    const image = document.getElementById("file").files[0];
    const imageUrl = $("#fileUrl").val();
    if (imageUrl == "" || title == "" || description == "") {
        swal({
            icon: "error",
            title: "Error!",
            text: "Some fields are not properly filled!",
            buttons: false,
        });
    } else {
        swal({
            icon: "warning",
            title: "Warning!",
            text: "Are you sure you want to add the project?",
            buttons: {
                cancel: "Cancel",
                true: "OK",
            },
        }).then((response) => {
            if (response == "true") {
                swal({
                    icon: "success",
                    title: "Project Added!",
                    text: "The project has been added to the portfolio!",
                    buttons: false,
                }).then((response) => {
                    const formdata = new FormData();
                    formdata.append("title", title);
                    formdata.append("description", description);
                    formdata.append("image_url", image);
                    axios
                        .post("/addproject", formdata, {
                            headers: {
                                "Content-Type": "multipart/formdata",
                            },
                        })
                        .then((response) => {
                            location.reload();
                        });
                });
            }
        });
    }
});

$("#submitExperiences").click(function () {
    const title = $("#experiencesTitle").val();
    const description = $("#experiencesDescription").val();

    if (title == "" || description == "") {
        swal({
            icon: "error",
            title: "Error!",
            text: "Some fields are not properly filled!",
            buttons: false,
        });
    } else {
        swal({
            icon: "warning",
            title: "Add Works and Experiences?",
            text: "Are you sure you want to add this to your work and experiences?",
            buttons: {
                cancel: "Cancel",
                true: "OK",
            },
        }).then((response) => {
            if (response == "true") {
                swal({
                    icon: "success",
                    title: "Works and Experiences Added!",
                    text: "The works and experiences has been updated!",
                    buttons: false,
                }).then((response) => {
                    const formdata = new FormData();
                    formdata.append("title", title);
                    formdata.append("description", description);
                    axios
                        .post("/addworksandexperiences", formdata)
                        .then((response) => {
                            location.reload();
                        });
                });
            }
        });
    }
});

$("#submitNewAdmin").click(function () {
    const name = $("#adminName").val();
    const email = $("#adminEmail").val();
    const password = $("#adminPassword").val();
    const confirmPassword = $("#adminConfirmPassword").val();
    const formdata = new FormData();
    if (name == "" || email == "" || password == "" || confirmPassword == "") {
        swal({
            icon: "error",
            title: "Error!",
            text: "Some fields are not properly filled!",
            buttons: false,
        });
    } else if (password != confirmPassword) {
        swal({
            icon: "error",
            title: "Error!",
            text: "Passwords does not match!",
            buttons: false,
        });
    } else {
        swal({
            icon: "success",
            title: "Admin added!",
            text: "Admin successfully added!",
            buttons: false,
        }).then((response) => {
            formdata.append("name", name);
            formdata.append("email", email);
            formdata.append("password", password);
            axios.post("/addadmin", formdata).then((response) => {
                location.reload();
            });
        });
    }
});

$("#deleteAll").click(function () {
    // $('input[name="locationthemes"]:checked');
    swal({
        icon: "warning",
        title: "Multiple Delete?",
        text: "Are you sure you want to delete multiple Works and Experiences?",
        buttons: {
            cancel: "Cancel",
            true: "OK",
        },
    }).then((response) => {
        if (response == "true") {
            $("input[name='multidelete']:checked").each(function () {
                const formdata = new FormData();
                formdata.append("id", this.value);
                axios
                    .post("/deleteworksandexperiences", formdata)
                    .then((response) => {
                        console.log(response);
                    })
                    .catch((e) => {
                        console.log(e);
                    });
            });
            swal({
                icon: "success",
                title: "Works and Experiences Deleted!",
                text: "The selected works and experiences have been deleted!",
                buttons: false,
            }).then((response) => {
                location.reload();
            });
        }
    });
});
$("#deleteAllCertifications").click(function () {
    // $('input[name="locationthemes"]:checked');
    swal({
        icon: "warning",
        title: "Multiple Delete?",
        text: "Are you sure you want to delete multiple Certifications?",
        buttons: {
            cancel: "Cancel",
            true: "OK",
        },
    }).then((response) => {
        if (response == "true") {
            $("input[name='multidelete']:checked").each(function () {
                const formdata = new FormData();
                formdata.append("id", this.value);
                axios
                    .post("/deletecertification", formdata)
                    .then((response) => {
                        console.log(response);
                    })
                    .catch((e) => {
                        console.log(e);
                    });
            });
            swal({
                icon: "success",
                title: "Certification Deleted!",
                text: "The selected Certification have been deleted!",
                buttons: false,
            }).then((response) => {
                location.reload();
            });
        }
    });
});
$("#deleteAllProjects").click(function () {
    // $('input[name="locationthemes"]:checked');
    swal({
        icon: "warning",
        title: "Multiple Delete?",
        text: "Are you sure you want to delete multiple Projects?",
        buttons: {
            cancel: "Cancel",
            true: "OK",
        },
    }).then((response) => {
        if (response == "true") {
            $("input[name='multidelete']:checked").each(function () {
                const formdata = new FormData();
                formdata.append("id", this.value);
                axios
                    .post("/deleteproject", formdata)
                    .then((response) => {
                        console.log(response);
                    })
                    .catch((e) => {
                        console.log(e);
                    });
            });
            swal({
                icon: "success",
                title: "Projects Deleted!",
                text: "The selected Projects have been deleted!",
                buttons: false,
            }).then((response) => {
                location.reload();
            });
        }
    });
});

$("#deleteAllAdmins").click(function () {
    swal({
        icon: "warning",
        title: "Multiple Delete?",
        text: "Are you sure you want to delete multiple Admins?",
        buttons: {
            cancel: "Cancel",
            true: "OK",
        },
    }).then((response) => {
        if (response == "true") {
            $("input[name='multidelete']:checked").each(function () {
                const formdata = new FormData();
                formdata.append("id", this.value);
                axios
                    .post("/deleteadmin", formdata)
                    .then((response) => {
                        console.log(response);
                    })
                    .catch((e) => {
                        console.log(e);
                    });
            });
            swal({
                icon: "success",
                title: "Admin Deleted!",
                text: "The selected Admin has been deleted!",
                buttons: false,
            }).then((response) => {
                location.reload();
            });
        }
    });
});

const swiper = new Swiper(".swiper", {
    effect: "cards",
    grabCursor: true,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});
