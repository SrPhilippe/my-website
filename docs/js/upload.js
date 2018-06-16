$(document).ready(() => {

    let $granFather = $("#painel-container");
    let $dad = $granFather.find(".change-picture-container");

    // Show upload image pop-up
    $granFather.find(".profile-picture").click((e) => {
        $dad.fadeIn().css("display", "flex");
    });

    // Hide upload image pop-up
    $dad.find(".hide-popup").click((e) => {
        $dad.fadeOut();
    });

    let $dadCont = $(".change-picture-container");
    let $form = $dadCont.find("form");
    let $image = $dadCont.find(".image img");
    let $preview = $dadCont.find(".preview");
    let $infoFile = $form.find("label[for='upload-photo']");


    // when some input changes
    $form.change((e) => {
        let dataFile = $form.find("#upload-photo").prop("files")[0];
        let reader = new FileReader();
        reader.readAsDataURL(dataFile);
        reader.onload = (e) => {
            $image.attr("src", e.target.result);
            $image.cropper({
                aspectRatio: 1,
                viewMode: 1,
                preview: $preview
            });
            $image.cropper("replace", e.target.result);
            console.log(reader);
        }

        console.log(dataFile);
        $infoFile.text(dataFile.name);
    });

    // When the form is submited
    $form.submit((e) => {
        e.preventDefault();
        // let imageURL = $image.cropper("getCroppedCanvas").toDataURL("image/jpeg", 0.1);
        $image.cropper("getCroppedCanvas").toBlob((blob) => {
            let formData = new FormData();
            formData.append("avatar", blob);
            console.log(formData.get("avatar"));
            $.ajax({
                url: "upload.php",
                method: "POST",
                data: formData,
                processData: false,
                contentType: false,
                xhr: () => {
                    let xhr = new XMLHttpRequest();
                    xhr.upload.addEventListener("progress", (e) => {
                        let percent = "0";
                        let percentage = "0%";
                        if (e.lengthComputable) {
                            percent = Math.round((e.loaded / e.total) * 100);
                            percentage = percent + '%';
                            console.log(percentage);
                        }
                    }, false);
                    return xhr;
                },
                success: (resp) => {
                    let data = $.parseJSON(resp);
                    console.log(data);
                    if (data.uploaded) {
                        location.reload();
                    }
                }
            });
        }, "image/jpeg", 0.5);
    });

});