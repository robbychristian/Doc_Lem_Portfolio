import axios from "axios";
import swal from "sweetalert";

$("#saveAboutMe").click(function () {
    swal({
        icon: "warning",
        title: "Save Changes?",
        text: "Are you sure you want to change the contents of About me?",
        buttons: {
            cancel: "Cancel",
            true: "OK",
        },
    }).then((response) => {
        if (response == "true") {
            swal({
                icon: "success",
                title: "Changes Saved!",
                text: "The changes that was made were saved!",
                buttons: false,
            }).then((response) => {
                const formdata = new FormData();
                const firstParagraph = $("#firstParagraph").val();
                const secondParagraph = $("#secondParagraph").val();
                const thirdParagraph = $("#thirdParagraph").val();
                const fourthParagraph = $("#fourthParagraph").val();
                const id = $("#aboutMeId").val();
                formdata.append("id", id);
                formdata.append("first_paragraph", firstParagraph);
                formdata.append("second_paragraph", secondParagraph);
                formdata.append("third_paragraph", thirdParagraph);
                formdata.append("fourth_paragraph", fourthParagraph);
                axios
                    .post("/editaboutme", formdata)
                    .then((response) => {
                        location.reload();
                    })
                    .then((e) => {
                        console.log(e);
                    });
            });
        }
    });
});
