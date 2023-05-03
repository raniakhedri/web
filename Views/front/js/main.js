$(function(){
    $("#form-total").steps({
        headerTag: "h2",
        bodyTag: "section",
        transitionEffect: "fade",
        enableAllSteps: true,
        autoFocus: true,
        transitionEffectSpeed: 500,
        titleTemplate : '<div class="title">#title#</div>',
        labels: {
            previous : 'Back',
            next : '<i class="zmdi zmdi-chevron-right"></i>',
            finish : '<i class="zmdi zmdi-chevron-right"></i>',
            current : ''
        },
        onStepChanging: function (event, currentIndex, newIndex) { 
            
            var fullname = $('#first_name').val() + ' ' + $('#last_name').val();
            var email = $('#Email').val();
            var phone = $('#phone').val();
            var address = $('#address').val();
            var gender = $('form input[type=radio]:checked').val();
            var AccountName = $('#AccountName').val();
            var AccountNumber = $('#AccountNumber').val();

            $('#fullname-val').text(fullname);
            $('#email-val').text(email);
            $('#phone-val').text(phone);
            $('#address-val').text(address);
            $('#gender-val').text(gender);
            $('#AccountName-val').text(AccountName);
            $('#AccountNumber-val').text(AccountNumber);

            return true;

        }
    });
});
