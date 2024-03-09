(function($) {
    "use strict";

    var form = $("#step-form-horizontal");
    form.children('div').steps({
        headerTag: "h4",
        bodyTag: "section",
        transitionEffect: "slideLeft",
        autoFocus: true,
        labels: {
            finish: "Soumettre"
        },
        onStepChanging: function (event, currentIndex, newIndex) {
            form.validate().settings.ignore = ":disabled,:hidden";
            return form.valid();
        },
        onFinishing: function(event, currentIndex) {
            // Soumission du formulaire via Ajax
            $.ajax({
                url: form.attr('action'),
                type: form.attr('method'),
                data: form.serialize(),
                success: function(response) {
                    // Gérer la réponse si nécessaire
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    // Gérer les erreurs si nécessaire
                    console.error(xhr.responseText);
                }
            });
            return true; // Permet la finition du processus de soumission
        },
        onFinished: function(event, currentIndex) {
            // Cette fonction sera appelée après la soumission du formulaire
        }
    });

})(jQuery);
