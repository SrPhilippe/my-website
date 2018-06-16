$(document).ready(() => {

    // The father of the forms
    let $dad = $("#pop-up");

    // Button to "open" popup
    $(".show-popup").each((i, el) => {
        $(el).click((e) => {
            $dad.fadeIn();
            $dad.find(".form-up").find("input:first").focus();
            $("body").css("overflow", "hidden");
            e.preventDefault();
        });
    });

    // Button to "close" popup
    $dad.children(".hide-popup").each((i, el) => {
        $(el).click((e) => {
            $dad.fadeOut();
            $("body").css("overflow", "auto");
            e.preventDefault();
        });
    });

    // Form that will apppear firstly
    $("#pop-up .form-up").first().show();
    // Toggle the form between login and register
    $("#pop-up .form-up").children("input[type='button']").click((e) => {
        $("#pop-up .form-up").slideToggle();
        e.preventDefault();
    });
    // Each form things
    $("#pop-up .form-up").each((i, el) => {
        // Disable autocomplete attribute from forms
        $(el).attr("autocomplete", "off");
        // Show / Hide password
        $(el).find("input[name='showPass']").click(() => {
            let $pass = $(el).find("input[name='password']");
            ($pass.attr("type") == "password") ? $pass.attr("type", "text"): $pass.attr("type", "password");
        });
        // Change cookie value
        var $remember = $(el).find("input[name='remember']");
        $remember.click(() => {
            ($remember.attr("value") == "1") ? $remember.attr("value", "0"): $remember.attr("value", "1");
        });

        $(el).validate({
            rules: {
                username: {
                    required: true,
                    minlength: 5,
                    maxlength: 20,
                    noSpace: true
                },
                password: {
                    required: true,
                    minlength: 6,
                    maxlength: 20,
                    noSpace: true
                },
                firstName: {
                    required: true,
                    minlength: 2,
                    maxlength: 30
                },
                email: {
                    required: true,
                    email: true
                }
            },
            messages: {
                username: {
                    required: "Insira seu usuário!",
                    minlength: jQuery.validator.format("Mínimo de {0} caracteres"),
                    maxlength: jQuery.validator.format("Máximo de {0} caracteres")
                },
                password: {
                    required: "Insira sua senha!",
                    minlength: jQuery.validator.format("Mínimo de {0} caracteres"),
                    maxlength: jQuery.validator.format("Máximo de {0} caracteres")
                },
                firstName: {
                    required: "Insira ao menos seu primeiro nome",
                    minlength: jQuery.validator.format("Mínimo de {0} caracteres"),
                    maxlength: jQuery.validator.format("Máximo de {0} caracteres")
                },
                email: {
                    required: "Por favor insira seu endereço de e-mail!",
                    email: "Insira um e-mail válido"
                }
            },
            submitHandler: subForm
        });
        // Function to not allow spaces
        jQuery.validator.addMethod("noSpace", function(value, element) {
            return value.indexOf(" ") < 0 && value != "";
        }, "Não é permitido o uso de espaço");

        // Alert elements
        let $boxMessage = $("#msg-container");
        let $message = $boxMessage.find(".msg");

        function subForm() {
            let data = $(el).serialize();
            console.log(data);
            $.ajax({
                method: "POST",
                url: "check.php",
                data: data,
                beforeSend: () => {
                    let login = "Checando banco de dados";
                    let register = "Processando dados da conta";
                    (i == 0) ? showProcess(login, true): showProcess(register, true);
                },
                success: (resp) => {
                    let data = JSON.parse(resp);
                    console.log(data);
                    showProcess(data.message, false);
                    closeBox(data.timeReload);
                    (data.reload) ? setTimeout(location.reload.bind(location), data.timeReload): null;
                    if (data.action == "registered") {
                        $dad.find(".form-up:last")[0].reset();
                        $dad.find(".form-up").last().slideUp();
                        $dad.find(".form-up").first().slideDown();
                    }
                }
            });
        };

        function showProcess(textProcessed, loading) {
            if (loading === true) {
                $message.html(`${textProcessed} <i class="fas fa-circle-notch"></i>`);
            } else {
                $message.html(textProcessed);
            }
            $boxMessage.fadeIn();
        };

        function closeBox(hasTime) {
            $boxMessage.delay(hasTime).fadeOut();
        };
    }); // End Each form

});
