$(document).ready(()=>
{
    let correct1 = false;   // - login check
    let correct2 = false;    // - pass1 check
    let correct3 = false;    // - pass2 check
    let correct4 = false;    // - email check

    let regExp1 = /^[a-zA-Z][a-zA-Z0-9_\-\.]{5,15}$/;
    let regExp2 = /^(?=.*[A-Z])(?=.*[a-z])(?=.*[0-9])(?=.*[_\-\.])[A-Z-a-z0-9_\-\.]{8,}$/;
    let regExp3 = /^([a-z0-9_-]+\.)*[a-z0-9_-]+@[a-z0-9_-]+(\.[a-z0-9_-]+)*\.[a-z]{2,6}$/;

    $('#login').blur(()=>
    {
        let loginValue = $('#login').val();
        console.log(loginValue);
        if(regExp1.test(loginValue))
        {
            $.ajax({
                type: "POST",
                url: "/php/vote-site/auth/ajax_check_login",
                data: "login="+loginValue,
                success: function(result)
                {
                    if(result === "taken")
                    {
                        $('#login-error').html("Цей логін уже використовується");
                        console.log('login-failed');
                        correct1 = false
                    }
                    else
                    {
                        $('#login-error').html('');
                        console.log('login-valid');
                        correct1 = true;

                    }
                }
            });
        }   
        else
        {
            console.log('login - failed');
            correct1 = false;
            $('#login-error').html('Login incorrect');
        }
    });

    $('#pass1').blur(()=>
    {
        
        let pass1Value = $('#pass1').val();
        console.log(pass1Value);
        if(regExp2.test(pass1Value))
        {
            console.log('pass1 - valid');
            $('#pass1-error').html('');
            correct2 = true;
        }   
        else
        {
            console.log('pass1 - failed');
            correct2 = false;
            $('#pass1-error').html('pass1 incorrect');
        }
    });

    $('#pass2').blur(()=>
    {
        let pass1Value = $('#pass1').val();
        let pass2Value = $('#pass2').val();
        console.log(pass2Value);
        if(pass1Value === pass2Value)
        {
            console.log('pass2 - valid');
            $('#pass2-error').html('');
            correct3 = true;
        }   
        else
        {
            console.log('pass2 - failed');
            correct3 = false;
            $('#pass2-error').html('password confirm not matching password');
        }
    });

    $('#email').blur(()=>
    {
        let emailValue = $('#email').val();
        console.log(emailValue);
        if(regExp3.test(emailValue))
        {
            $.ajax({
                type: "POST",
                url: "/php/vote-site/auth/ajax_check_email",
                data: "email="+emailValue,
                success: function(result)
                {
                    if(result === "taken")
                    {
                        $('#email-error').html("Цей email уже використовується");
                        console.log('email-failed');
                        correct4 = false
                    }
                    else
                    {
                        $('#email-error').html('');
                        console.log('email-valid');
                        correct4 = true;

                    }
                }
            });
        }   
        else
        {
            console.log('email - failed');
            correct4 = false;
            $('#email-error').html('email incorrect');
        }
    });


    $('#submit').click(()=>
    {
        if(correct1 === true && correct2 === true && correct3 === true && correct4 === true)
        {
            $('#regform').attr('onsubmit', 'return true');
        }
        else
        {
            let blockMessage = 'Форма містить некоректні данні!\n';
            blockMessage += 'Відправка данних заблокована!';
            alert(blockMessage);
        }
    });
})